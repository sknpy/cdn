
<html>
        <head>
                <title>dplayer增加记忆+P2P播放</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta http-equiv="X-UA-Compatible" content="IE=11" />
                <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">
                <link rel="stylesheet"  /> 
                <style type="text/css">
                        body,html{width:100%;height:100%;background:#000;padding:0;margin:0;overflow-x:hidden;overflow-y:hidden}
                        *{margin:0;border:0;padding:0;text-decoration:none}
                        #stats{position:fixed;top:5px;left:10px;font-size:10px;color:#fdfdfd;z-index:20719029;text-shadow:1px 1px 1px #000, 1px 1px 1px #000}
                        #dplayer{position:inherit}
                         
                        #play_icon { 
                                background-color: black; 
                                height:100%;
                                background-image: url("data:image/gif;base64,R0lGODlhxgL0AfU/ANLS0gAAAGRkZKOjo4WFhaurq9zc3ERERAQGB/mHAMTExLu7u////+Pj46NZAKEnEh1unT4+PpmZme8/IlhYWHFxcchtAGc4ALOzs8MzHC4uLhdWe5GRkY6OjkxMTCaRzi+z/zIRBUoUC1ItAHx8fPCCABoaGu/v7/j4+OB6AB+AtHAdDy2q8w86UutCJyil6RgJAn9FANo6HxTD/hO89AsqPAYTGwoKCjOx/wcaJgoEATwgACmb3QMNEiIPAgAAACH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpBNDE3REMxQjMwRUJFNTExOTI4ODhCRjI3RTdCQzk1OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozQkQ3REM1OTRGQkIxMUU2QTExQzhCRjZGQTQ1QkMxNyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozQkQ3REM1ODRGQkIxMUU2QTExQzhCRjZGQTQ1QkMxNyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJv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"); 
                                background-size: contain; 
                                background-repeat: no-repeat; 
                                background-position: center;   
                                display:flex; 
                                align-items: center;   
                                position: absolute; 
                                top: 0px; 
                                left: 0px; 
                                width: 100%;
                        }
                        #play_icon img {  
                                width:10%; 
                                margin-left: 45%;
                        } 
                </style>
         
        </head>
        <body style="background:#000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" oncontextmenu=window.event.returnValue=false>
                <div id="dplayer"></div>
                <div id="stats"></div>
                <div id="play_icon"></div>
                <script src="https://cdn.jsdelivr.net/npm/cdnbye@latest"></script>
                <script src="https://cdn.jsdelivr.net/npm/dplayer@latest"></script>
                <script>
                        var url = '<?php echo($_REQUEST['url']);?>';
                        var isWap = navigator.userAgent.match(/iPad|iPhone|iPod|Baidu/i) != null; //百度浏览器和苹果移动端不使用P2P功能
                        if(!isWap){
                                if(url.indexOf(".m3u8") > 0){          
                                        var _peerId = '', _peerNum = 0, _totalP2PDownloaded = 0, _totalP2PUploaded = 0;        
                                        var type = 'customHls';
                                }
                                else {
                                        var type = 'normal'; //MP4格式P2P兼容性不好，不调用P2P。
                                }
                                var dp = new DPlayer({
                                        container: document.getElementById('dplayer'),
                                        autoplay: true,
                                        hotkey: true,  // 移动端全屏时向右划动快进，向左划动快退。
                                        logo: '',
                                        video: {
                                                url:url,
                                                pic: '',  //图片地址。
                                                type: type,
                                                customType: {
                                                        'customHls': function (video, player) {
                                                                const hls = new Hls({
                                                                        debug: false,
                                                                        p2pConfig: {
                                                                                logLevel: true,
                                                                                live: false,        // 如果是直播设为true
                                                                        }
                                                                });
                                                                hls.loadSource(video.src);
                                                                hls.attachMedia(video);
                                                                hls.p2pEngine.on('stats', function (stats) {
                                                                        _totalP2PDownloaded = stats.totalP2PDownloaded;
                                                                        _totalP2PUploaded = stats.totalP2PUploaded;
                                                                        //updateStats();
                                                                }).on('peerId', function (peerId) {
                                                                        _peerId = peerId;
                                                                }).on('peers', function (peers) {
                                                                        _peerNum = peers.length;
                                                                        //updateStats();
                                                                });
                          
                                                        }
                                                }
                                        },                        
                                        /*danmaku: {
                                                id: 'E3368B56CDBB4IU',   //弹幕代码，可定义其他的ID，请修改；
                                                api: 'https://dplayer.moerats.com/',
                                                bottom: '25%',
                                                unlimited: false,
                                        }, */             
                                        contextmenu: [
                                        ],
                                        highlight: [
                                                {
                                                        text: '提示：点击下方状态栏可以发送字幕',
                                                        time: 360,
                                                },
                                                {
                                                        text: '警告：请不要相信视频中任何广告与字幕',
                                                        time: 1200,
                                                },
                                        ]
                                });
                                 
                                var webdata = {
                                        set:function(key,val){
                                                window.sessionStorage.setItem(key,val);
                                        },
                                        get:function(key){
                                                return window.sessionStorage.getItem(key);
                                        },
                                        del:function(key){
                                                window.sessionStorage.removeItem(key);
                                        },
                                        clear:function(key){
                                                window.sessionStorage.clear();
                                        }
                                };
                                dp.seek(webdata.get('vod'+url));
                                setInterval(function(){
                                        webdata.set('vod'+url,dp.video.currentTime);
                                },1000);
                                dp.on('ended',function() {
                                        dp.notice("视频播放已结束");                   //可以替换成下一集调用等代码
                                        if(parent.MacPlayer.PlayLinkNext!=''){
                                        top.location.href = parent.MacPlayer.PlayLinkNext;}
                                });        
                        }
                        else{
                                document.getElementById('dplayer').innerHTML='<video src="'+url+'" controls="controls" preload="preload" poster="" width="100%" height="100%" autoplay="autoplay"></video>';
                        }
                        function updateStats() {
                                var text = '七星P2P正在为您加速' + (_totalP2PDownloaded/1024).toFixed(2)
                                        + 'MB 已分享' + (_totalP2PUploaded/1024).toFixed(2) + 'MB' + ' 连接节点' + _peerNum + '个';
                                document.getElementById('stats').innerText = text ;
                        }
                </script>
                <script>
                 
                        var video = document.getElementsByTagName('video')[0];
                        video.oncanplay = function(){
                                video.play();
                        }
                         
                        if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                                //手机端
                                var img = new Image();
                                img.src="data:image/png;base64,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";
                                document.getElementById("play_icon").appendChild(img);
                                 
                                video.setAttribute("playsinline", "true");
                                video.setAttribute("webkit-playsinline", "true");
                                video.setAttribute("x5-video-player-type", "h5");
                                video.setAttribute("x5-video-player-fullscreen", "true");
                                 
                                video.onplay = function(){
                                        document.getElementById("play_icon").style.display = "none"; 
                                }
                                 
                                video.onpause = function(){
                                        document.getElementById("play_icon").style.display = null; 
                                        document.getElementById("play_icon").style.backgroundColor = "transparent"; 
                                        document.getElementById("play_icon").style.backgroundImage = "url()"; 
                                }
                         
                                var state = 0;
                                document.addEventListener('touchstart', function(){    
                                        if(state==0){        
                                                video.play();        
                                                state=1;    
                                        }
                                }, false);
                                document.addEventListener("WeixinJSBridgeReady", function () {    
                                        video.play();
                                }, false);
                        }else{
                                //电脑端
                                document.getElementById("play_icon").remove();
                        }
                         
                        function playVideo(){
                                document.getElementById("play_icon").style.display = "none"; 
                                video.play()
                        }        
                         
                         
                </script>
                 
        </body>
</html>