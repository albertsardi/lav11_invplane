<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Allegro - ERP System Administrator</title>
<meta name="description" content="Allegro - ERP System Administrtor">
<meta name="author" content="Albert - (c)ASAfoodenesia">

<html lang="en">

<head>
	<!-- BEGIN CSS for this page -->
	<style media="only screen">
      :root,
      body {
        height: 100%;
        width: 100%;
        margin: 0;
        box-sizing: border-box;
        -webkit-overflow-scrolling: touch;
      }

      html {
        position: absolute;
        top: 0;
        left: 0;
        padding: 0;
        overflow: auto;
        font-family: -apple-system, "system-ui", "Segoe UI", Roboto,
          "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif,
          "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
          "Noto Color Emoji";
      }

      body {
        padding: 16px;
        overflow: auto;
        background-color: transparent;
      }

      /* Hide codesandbox highlighter */
      body > #highlighter {
        display: none;
      }
    </style>
	<!-- END CSS for this page -->

	<!-- ag-grid -->
	<script>
      var appLocation = "";
      var boilerplatePath = "";
      var systemJsMap = {
        "@ag-grid-community/styles":
          "https://cdn.jsdelivr.net/npm/@ag-grid-community/styles@32.1.0",
        "ag-grid-charts-enterprise":
          "https://cdn.jsdelivr.net/npm/ag-grid-charts-enterprise@32.1.0/",
        "ag-grid-community":
          "https://cdn.jsdelivr.net/npm/ag-grid-community@32.1.0",
        "ag-grid-enterprise":
          "https://cdn.jsdelivr.net/npm/ag-grid-enterprise@32.1.0/",
      };
      var systemJsPaths = {
        "@ag-grid-community/client-side-row-model":
          "https://cdn.jsdelivr.net/npm/@ag-grid-community/client-side-row-model@32.1.0/dist/package/main.cjs.js",
        "@ag-grid-community/core":
          "https://cdn.jsdelivr.net/npm/@ag-grid-community/core@32.1.0/dist/package/main.cjs.js",
        "@ag-grid-community/csv-export":
          "https://cdn.jsdelivr.net/npm/@ag-grid-community/csv-export@32.1.0/dist/csv-export.cjs.min.js",
        "@ag-grid-community/infinite-row-model":
          "https://cdn.jsdelivr.net/npm/@ag-grid-community/infinite-row-model@32.1.0/dist/package/main.cjs.js",
        "@ag-grid-community/locale":
          "https://cdn.jsdelivr.net/npm/@ag-grid-community/locale@32.1.0/dist/package/main.cjs.js",
        "ag-charts-community":
          "https://cdn.jsdelivr.net/npm/ag-charts-community@10.1.0/",
      };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/systemjs@0.19.47/dist/system.js"></script>
    <script src="systemjs.config.js"></script>
	<script>
      System.import("main.ts").catch(function (err) {
        document.body.innerHTML =
          '<div class="example-error" style="background:#fdb022;padding:1rem;">' +
          "Example Error: " +
          err +
          "</div>";
        console.error(err);
      });
    </script>
</html>


</head>

<body class="adminbody">


	<!-- Your Data Grid container -->
<div id="myGrid" class="ag-theme-quartz" style="height: 500px"></div>



</body>

</html>
