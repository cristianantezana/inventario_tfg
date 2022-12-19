<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}code{font-family:monospace,monospace;font-size:1em}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}code{font-family:Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-gray-400{--border-opacity:1;border-color:#cbd5e0;border-color:rgba(203,213,224,var(--border-opacity))}.border-t{border-top-width:1px}.border-r{border-right-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-xl{max-width:36rem}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.uppercase{text-transform:uppercase}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.tracking-wider{letter-spacing:.05em}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@-webkit-keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@-webkit-keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@-webkit-keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@-webkit-keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            html,body{
    margin:0;
    padding:0;
    display:flex;
    justify-content:center;
    align-items:center;
    background-color:rgb(0, 0, 0);
    font-family:"Quicksand", sans-serif;

}

#container_anim{
    position:relative;
    width:100%;
    height:70%;
}

#key{
    position:absolute;
    top:77%;
    left:-33%;
}

#text{
  font-size:3rem;
  color: white;
  position:absolute;
  top:55%;
  width:100%;
  text-align:center;
}

#credit{
    position:absolute;
    bottom:0;
    width:100%;
    text-align:center;
    bottom:
}

a{
    color: rgb(115,102,102);
}
        </style>
    </head>
    <body class="antialiased">
        <div id="container_anim">
            <div id="lock" class="key-container">
                <?xml version="1.0" standalone="no"?><!-- Generator: Gravit.io --><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="317.286 -217 248 354" width="248" height="354"><g><path d="M 354.586 -43 L 549.986 -43 C 558.43 -43 565.286 -36.144 565.286 -27.7 L 565.286 121.7 C 565.286 130.144 558.43 137 549.986 137 L 354.586 137 C 346.141 137 339.286 130.144 339.286 121.7 L 339.286 -27.7 C 339.286 -36.144 346.141 -43 354.586 -43 Z" style="stroke:none;fill:#2D5391;stroke-miterlimit:10;"/><g transform="matrix(-1,0,0,-1,543.786,70)"><text transform="matrix(1,0,0,1,0,234)" style="font-family:'Quicksand';font-weight:700;font-size:234px;font-style:normal;fill:#4a4444;stroke:none;">U</text></g><g transform="matrix(-1,0,0,-1,530.786,65)"><text transform="matrix(1,0,0,1,0,234)" style="font-family:'Quicksand';font-weight:700;font-size:234px;font-style:normal;fill:#8e8383;stroke:none;">U</text></g><path d="M 343.586 -52 L 538.986 -52 C 547.43 -52 554.286 -45.144 554.286 -36.7 L 554.286 112.7 C 554.286 121.144 547.43 128 538.986 128 L 343.586 128 C 335.141 128 328.286 121.144 328.286 112.7 L 328.286 -36.7 C 328.286 -45.144 335.141 -52 343.586 -52 Z" style="stroke:none;fill:#4A86E8;stroke-miterlimit:10;"/><g><circle vector-effect="non-scaling-stroke" cx="441.28571428571433" cy="63.46153846153848" r="10.461538461538453" fill="rgb(0,0,0)"/><rect x="436.055" y="66.538" width="10.462" height="34.462" transform="matrix(1,0,0,1,0,0)" fill="rgb(0,0,0)"/></g></g></svg>
            </div>
        
            <div id="key">
                <?xml version="1.0" standalone="no"?><!-- Generator: Gravit.io --><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="232.612 288.821 169.348 109.179" width="169.348" height="109.179"><g><path d=" M 382.96 349.821 L 368.96 349.821 L 368.96 314.821 L 382.96 307.821 L 382.96 349.821 Z " fill="rgb(55,49,49)"/><path d=" M 292.134 354.827 L 379.96 315.39 L 379.96 305.547 L 292.134 343.094 L 292.134 354.827 Z " fill="rgb(55,49,49)"/><path d=" M 280.96 340.109 L 401.96 288.821 L 401.96 340.109 L 382.96 349.972 L 382.96 308.547 L 265.96 360.821 L 259.96 349.972 L 280.96 340.109 Z " fill="rgb(115,102,102)"/><path d=" M 401.96 288.821 L 382.96 288.821 L 280.96 332.821 L 292.134 340.109 L 401.96 288.821 Z " fill="rgb(115,102,102)"/><g><path d=" M 232.755 354.125 C 230.958 328.501 246.297 306.519 266.988 305.068 C 287.679 303.617 305.937 323.243 307.734 348.867 C 309.531 374.492 294.191 396.473 273.5 397.924 C 252.809 399.375 234.552 379.75 232.755 354.125 Z " fill="rgb(55,49,49)"/><path d=" M 239.241 352.316 C 237.564 328.406 252.144 307.876 271.779 306.499 C 291.414 305.122 308.716 323.416 310.393 347.326 C 312.07 371.236 297.49 391.766 277.855 393.143 C 258.22 394.52 240.917 376.226 239.241 352.316 Z " fill="rgb(115,102,102)"/><path d=" M 260.038 353.084 C 259.196 348.171 261.788 343.621 265.822 342.929 C 269.856 342.238 273.816 345.665 274.658 350.578 C 275.5 355.49 272.909 360.041 268.874 360.732 C 264.84 361.424 260.88 357.997 260.038 353.084 Z " fill="salmon"/></g></g></svg>
            </div>
        </div>
    
        <p id="text">403 | @yield('message')</p>
       
    
    </body>
    <script>
        var lock = document.querySelector('#lock');
var key = document.querySelector('#key');


function keyAnimate(){
    dynamics.animate(key, {
        translateX: 33
    }, {
        type:dynamics.easeInOut,
        duration:500,
        complete:lockAnimate
    })
}


function lockAnimate(){
    dynamics.animate(lock, {
        rotateZ:-5,
        scale:0.9
        }, {
            type:dynamics.bounce,
            duration:3000,
            complete:keyAnimate
        })
}


setInterval(keyAnimate, 3000);
    </script>
</html>
