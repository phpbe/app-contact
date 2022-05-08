<be-html>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <style type="text/css">
        html{height:100%;font-size: 14px;}
        body{height:100%;margin:0;padding:0}
        #baidu-map{height:100%}
    </style>
    <script type="text/javascript" src="https://api.map.baidu.com/api?v=1.5&ak=<?php echo $this->configContact->mapKeyBaidu; ?>"></script>
</head>
<body>

<div id="baidu-map"></div>
<script type="text/javascript">
    let oPoint = new BMap.Point(<?php echo $this->configContact->lng; ?>, <?php echo $this->configContact->lat; ?>);
    let oMap = new BMap.Map("baidu-map");                        // 创建Map实例

    oMap.centerAndZoom(oPoint, 18);
    oMap.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
    oMap.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
    oMap.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
    oMap.enableScrollWheelZoom();                            //启用滚轮放大缩小
    oMap.addControl(new BMap.MapTypeControl());          //添加地图类型控件

    let oMarker = new BMap.Marker( oPoint );  // 创建标注
    oMap.addOverlay(oMarker);              // 将标注添加到地图中

    // 创建信息窗口对象
    let oInfoWindow = new BMap.InfoWindow("<?php echo $this->configContact->markerAddress; ?>", {
        width : 200,     // 信息窗口宽度
        height: 60,     // 信息窗口高度
        title : "<strong><?php echo $this->configContact->markerTitle; ?></strong>"  // 信息窗口标题
    });
    oMap.openInfoWindow(oInfoWindow, oPoint); //开启信息窗口

    oMarker.addEventListener("click", function(){this.openInfoWindow(oInfoWindow);});

</script>
</body>
</html>
</be-html>