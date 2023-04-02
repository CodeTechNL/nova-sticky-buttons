let stickAfter = Nova.appConfig.codetech_scroll_stick_at,
    stickPermanent = Nova.appConfig.codetech_scroll_stick_permanent,
    elementClassList = document.getElementById('app').classList;

if (!stickPermanent) {
    window.addEventListener("scroll", function (e) {
        let currentScrollPosition = document.documentElement.scrollTop

        if (currentScrollPosition >= stickAfter) {
            stick(elementClassList);
            return;
        }
        unstick(elementClassList);
    });
} else {
    stick(elementClassList)
}

function stick(element) {
    element.add('codetech-sticky-resource-buttons')
}

function unstick(element) {
    element.remove('codetech-sticky-resource-buttons')
}
