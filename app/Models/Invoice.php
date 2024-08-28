<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
	protected $table = 'invoice'; 
	//protected $primaryKey = 'Code';
	//protected $keyType = 'string';
	// protected $fillable = ['Code', 'Name', 'Barcode', 'Category'];
	public $timestamps = false;
	const CREATED_AT = 'CreatedDate'; //change laravel timestamp
	const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp

  	public static function Get($jr, $id, $option=null) {
		$data = Invoice::where('TransNo', $id)->first();
		if (!empty($data)) {
			$data['detail'] = DB::table('transdetail')
								->where('InvNo', $data->TransNo)
								->get()->toArray();
			foreach($data['detail']  as $dt) {
				$dt->Qty = abs($dt->Qty);
			}
			$data=(object)$data;
		} else {
			$data['detail'] = [];
		}
		//add option
		if ($option['Account']) {
			$data->Account = DB::table('masteraccount')->where('AccCode',$data->Account)->first();
		}
    	return (object)['status'=>'OK', 'data'=>$data];
  	}

	public static function GetListSalesInvoiceUnpaid($option=null) {
		$data = DB::table('transhead as th')->selectRaw('th.TransNo,th.TransDate,th.Total,IFNULL(SUM(AmountPaid),0)AS InvPaid,(Total-IFNULL(SUM(AmountPaid),0))AS InvUnpaid')
				->leftJoin('transpaymentarap as arap', 'arap.InvNo', '=', 'th.TransNo')
				->groupBy('th.TransNo', 'TransDate', 'Total')
				->havingRaw('InvUnpaid<>0')
				->whereRaw("LEFT(th.TransNo,2) IN ('SI','IN')")
				->get();
		return (object)['status'=>'OK', 'data'=>$data];
	}

	public static function GetListPurchaseInvoiceUnpaid($option=null) {
		$data = DB::table('transhead as th')->selectRaw('th.TransNo,th.TransDate,th.Total,IFNULL(SUM(AmountPaid),0)AS InvPaid,(Total-IFNULL(SUM(AmountPaid),0))AS InvUnpaid')
				->leftJoin('transpaymentarap as arap', 'arap.InvNo', '=', 'th.TransNo')
				->groupBy('TransNo', 'TransDate', 'Total')
				->havingRaw('InvUnpaid<>0')
				->whereRaw("LEFT(th.TransNo,2) IN ('PI')")
				->get();
		return (object)['status'=>'OK', 'data'=>$data];
	}

	public static function getStatus($invno) {
		$inv = Invoice::where('TransNo', $invno)->first();
		$total = $inv['Total']??0;
		$paid = ($inv['FirstPaymentAmount']??0)+Payment::where('InvNo',$invno)->sum('AmountPaid');
		$outstanding = $total - $paid;
		$out = [
			'InvAmount' 	=> $total,
			'PaidAmount' 	=> $paid,
			'Outstanding'	=> $outstanding,
		];
		//dd($out);
		return $out;
	}

}


