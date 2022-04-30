<be-html>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            html{height:100%}
            body{height:100%;margin:0;padding:0}
            #baidu-map{height:100%}
        </style>
        <script type="text/javascript" src="https://api.map.baidu.com/api?v=1.5&ak=<?php echo $this->configContact->mapKeyBaidu; ?>"></script>
    </head>
    <body>

    <div id="baidu-map"></div>
    <script type="text/javascript">
        var oPoint = new BMap.Point(<?php echo $this->configContact->lng; ?>, <?php echo $this->configContact->lat; ?>);
        var oMap = new BMap.Map("baidu-map");                        // 创建Map实例

        oMap.centerAndZoom(oPoint, 18);
        oMap.addControl(new BMap.NavigationControl());               // 添加平移缩放控件
        oMap.addControl(new BMap.ScaleControl());                    // 添加比例尺控件
        oMap.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件
        oMap.enableScrollWheelZoom();                            //启用滚轮放大缩小
        oMap.addControl(new BMap.MapTypeControl());          //添加地图类型控件

        var oMarker = new BMap.Marker( oPoint );  // 创建标注
        oMarker.enableDragging();
        oMap.addOverlay(oMarker);              // 将标注添加到地图中


        oMap.addEventListener("click",function(e){
            oMarker.setPosition(new BMap.Point(e.point.lng, e.point.lat));
            parent.setLngLat(e.point.lng,e.point.lat);
        });

        oMarker.addEventListener("dragend", function(){
            var p = oMarker.getPosition();
            parent.setLngLat(p.lng, p.lat);
        });

    </script>
    </body>
    </html>
</be-html>