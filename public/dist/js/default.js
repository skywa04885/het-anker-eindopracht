"use strict";
document.onreadystatechange = function () {
    // ==== Checks if we may proceed ====
    if (document.readyState === 'complete') {
        // ==== Adds the loader event to most anchor tags ====
        var loader_1 = document.getElementById('loader');
        // Gets the anchor tags
        var anchors = document.getElementsByTagName('a');
        // Assigns the click events
        if (anchors)
            for (var i = 0; i < anchors.length; i++) {
                // Adds the click listener
                anchors[i].addEventListener('click', function (e) {
                    // Prevents the default one
                    e.preventDefault();
                    // Enables the loader
                    loader_1 === null || loader_1 === void 0 ? void 0 : loader_1.setAttribute("style", "display:block;");
                    // Sets the timeout and clicks
                    setTimeout(function () {
                        var url = e.target.getAttribute('href');
                        if (!url)
                            url = '/';
                        window.location.href = url;
                    }, 250);
                });
            }
    }
};
