@extends('layouts.app')
    @section('content')

    <!DOCTYPE html>
    <html>


        <style>
            .body{
                margin-left:220px;
            }
            .container1 {
                position: relative;
                text-align: center;
                height: 100%;
                margin-left: 220px;
            }
            .suprise_background {
                position: absolute;
                background-image: url('/images/未命名設計.svg');
                /* 修改路径 */
                background-size: cover;
                background-position: center;
                width: 100%;
                height: 100%;
                z-index: 1;
                /* 确保背景图片在内容之下 */
            }
            .back {
                background: #fef8f2;
                border: 1px solid #dddddd00;
                flex-direction: column;
                width: 45%;
                height: 50%;
                margin-left: 350px;
                margin-top: 20vh;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                align-items: center;
                text-align: center;
                z-index: 5;
            }
            #randomButton {
                padding: 15px 20px;
                font-size: 25px;
                cursor: pointer;
                border: none;
                border-radius: 50px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                background-color: #a7833c;
                color: #fffcf5;
                z-index: 5;
            }
            
        </style>


        @php
            // 將集合轉換為組數
            $postsArray = $posts->toArray();
            // 如果集合不為空
            $randomPost = [
                'restaurant' => 'No restaurants found',
                'date' => '',
                'time' => 'No time found',
            ];
            if (!empty($postsArray)) {
                // 隨機選擇一個項目
                $randomIndex = array_rand($postsArray);
                $randomPost = $postsArray[$randomIndex];
            }
        @endphp
        <body>
        <div class="container1">
            <div class="suprise_background">

                <!-- 输出隨機選擇的餐廳 -->
                <div class="back">
                <br><br>
                <span style="color: #8B4513; font-size: 35px;">驚喜包</span>
                <br>
                <!-- 在模板中添加一个按钮 -->
                <div id="random"></div>
                    <!-- JavaScript 代碼 -->
            </div>       
            <br>     
            <button id="randomButton">驚喜按鈕</button>
    </body>

    <script>
                        // 將 PHP 變量傳遞到 JavaScript 中
                        var postsArray = @json($postsArray);
                        var randomPost = @json($randomPost);
                        // 定義一個函數用於獲取隨機數據並更新頁面顯示
                        function getRandom() {
                            // 如果 postsArray 不為空，從重新隨機選擇一個項目
                            if (postsArray.length > 0) {
                                var randomIndex = Math.floor(Math.random() * postsArray.length);
                                randomPost = postsArray[randomIndex];
                            } else {
                                randomPost = {
                                    restaurant: 'No restaurants found',
                                    time: 'No time found'
                                };
                            }
                            // 將隨機選擇的餐廳顯示在頁面上
                            document.getElementById('random').innerHTML =
                                '<div style="margin-top:10vh;text-align: center; font-size: 32px;color: #4B2E20;">' + '餐廳地點:' + randomPost.restaurant +
                                '<br>' + '用餐時間:' + randomPost.time + '<br><br></div>';
                        }
                        // 當按鈕被點擊時觸發事件
                        document.getElementById('randomButton').addEventListener('click', function() {
                            // 調用函數獲取隨機數據並更新頁面顯示
                            getRandom();
                        });
                    </script>
    @push('scripts')
        <script>
            window.onload = function() {
                var surpriseSVG = document.getElementById('surpriseSVG');
                if (surpriseSVG) {
                    // Clear existing content
                    surpriseSVG.innerHTML = '';

                    // Add new SVG content
                    surpriseSVG.innerHTML = `
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.1 7.19043H4C3.05719 7.19043 2.58579 7.19043 2.29289 7.48332C2 7.77622 2 8.24762 2 9.19043V11.0234C2 11.9662 2 12.4377 2.29289 12.7305C2.5452 12.9829 2.92998 13.0178 3.63447 13.0227H11.1V7.19043ZM5.33333 14.8227V20.1904C5.33333 21.1332 5.33333 21.6046 5.62623 21.8975C5.91912 22.1904 6.39052 22.1904 7.33333 22.1904H11.1V14.8227H5.33333ZM12.9 22.1904H16.6667C17.6095 22.1904 18.0809 22.1904 18.3738 21.8975C18.6667 21.6046 18.6667 21.1332 18.6667 20.1904V14.8227H12.9V22.1904ZM20.7724 13.0227C21.0648 13.0198 21.2388 13.0069 21.3827 12.9473C21.6277 12.8458 21.8224 12.6511 21.9239 12.4061C22 12.2223 22 11.9894 22 11.5234V9.19043C22 8.24762 22 7.77622 21.7071 7.48332C21.4142 7.19043 20.9428 7.19043 20 7.19043H12.9V13.0227H20.7724Z"
                            fill="currentColor" />
                        <path
                            d="M16.2645 6.12593L17.8184 5.69084C18.517 5.49523 19 4.85846 19 4.13298C19 3.06172 17.9776 2.28627 16.946 2.57512L16.6334 2.66265C15.2274 3.05634 13.9216 3.74582 12.8036 4.68496L12 5.36V6.2H15.7253C15.9076 6.2 16.089 6.17508 16.2645 6.12593Z"
                            fill="currentColor" />
                        <path
                            d="M7.73546 6.12593L6.18158 5.69084C5.48297 5.49523 5 4.85846 5 4.13298C5 3.06172 6.0224 2.28627 7.05398 2.57512L7.3666 2.66265C8.77264 3.05634 10.0784 3.74582 11.1964 4.68496L12 5.36V6.2H8.27472C8.09243 6.2 7.91099 6.17508 7.73546 6.12593Z"
                            fill="currentColor" />
                    </svg>`;

                    var navLinks = document.querySelectorAll('.nav-link');
                    navLinks.forEach(function(link) {
                        link.addEventListener('click', function() {
                            surpriseSVG.innerHTML = `
                            <svg id="surpriseSVG" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 9C2 8.05719 2 7.58579 2.29289 7.29289C2.58579 7 3.05719 7 4 7H20C20.9428 7 21.4142 7 21.7071 7.29289C22 7.58579 22 8.05719 22 9V11.5833C22 12.2064 22 12.5179 21.866 12.75C21.7783 12.902 21.652 13.0283 21.5 13.116C21.2679 13.25 20.9564 13.25 20.3333 13.25V13.25C19.7103 13.25 19.3987 13.25 19.1667 13.384C19.0146 13.4717 18.8884 13.598 18.8006 13.75C18.6667 13.9821 18.6667 14.2936 18.6667 14.9167V20C18.6667 20.9428 18.6667 21.4142 18.3738 21.7071C18.0809 22 17.6095 22 16.6667 22H7.33333C6.39052 22 5.91912 22 5.62623 21.7071C5.33333 21.4142 5.33333 20.9428 5.33333 20V14.9167C5.33333 14.2936 5.33333 13.9821 5.19936 13.75C5.11159 13.598 4.98535 13.4717 4.83333 13.384C4.60128 13.25 4.28974 13.25 3.66667 13.25V13.25C3.04359 13.25 2.73205 13.25 2.5 13.116C2.34798 13.0283 2.22174 12.902 2.13397 12.75C2 12.5179 2 12.2064 2 11.5833V9Z"
                                    stroke="currentColor" stroke-width="2" />
                                <path d="M4 13.25H20" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                                <path d="M12 7L12 21" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                                <path
                                    d="M12 6L11.1214 5.12144C10.0551 4.05514 8.75521 3.25174 7.3246 2.77487V2.77487C6.18099 2.39366 5 3.24487 5 4.45035V4.63246C5 5.44914 5.52259 6.1742 6.29737 6.43246L8 7"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                <path
                                    d="M12 6L12.8786 5.12144C13.9449 4.05514 15.2448 3.25174 16.6754 2.77487V2.77487C17.819 2.39366 19 3.24487 19 4.45035V4.63246C19 5.44914 18.4774 6.1742 17.7026 6.43246L16 7"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>`;
                        });
                    });
                }
            };
        </script>

        </html>

