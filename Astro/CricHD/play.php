<!DOCTYPE html>
<html>
<head>
    <title><?php @$name = str_replace('_', ' ', @$_REQUEST["crichd"]); echo @$name; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <script src="https://content.jwplatform.com/libraries/SAHhwvZq.js"></script>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #000;
            overflow: hidden;
        }

        #video-container {
            position: relative;
            width: 100vw;
            height: 56.25vw; /* 16:9 aspect ratio (9/16 = 0.5625) */
            max-height: 100vh;
            max-width: 177.78vh; /* 16:9 aspect ratio (16/9 = 1.7778) */
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #video-player {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="video-container">
        <div id="video-player"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const playerInstance = jwplayer("video-player");
            
            playerInstance.setup({
                file: "<?php printf('master.m3u8/?key=Extra-Tv&c=%s', $_REQUEST['cricid']); ?>",
                width: "100%",
                height: "100%",
                autostart: true,
                mute: false,
                primary: "html5",
                hlshtml: true,
                aspectratio: "16:9",
                stretching: "uniform",
                playbackRateControls: true,
                controls: true,
                skin: {
                    name: "seven"
                },
                analytics: {
                    enabled: false
                },
                qualityLabels: {
                    1080: "HD",
                    720: "High",
                    480: "Medium",
                    360: "Low"
                }
            });

            playerInstance.on('levels', function(event) {
                const levels = event.levels;
                if (levels && levels.length > 1) {
                    playerInstance.setCurrentQuality(levels.length - 1);
                }
            });
        });
    </script>
</body>
</html>