<div>
   <select name="{{$name}}" id="{{$name}}"
                                	class="{{$class}}" data-minimum-results-for-search="Infinity">
                                                                            <?php 
                                                                            $data = json_decode($data);
                                                                            ?>
                                                                            @foreach($data as $d)
                                                                                <?php dd($d);?>
                                                                                <option value="{{$d->id}}" >{{$d->name??''}}</option>                                        </option>
                                                                            @endforeach
                                                                            <option value=" 1" > Female</option>                                        </option>
                                                                            <option value=" 2" > Other</option>
                                                                            </select>
</div>