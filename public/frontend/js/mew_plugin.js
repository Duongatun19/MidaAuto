const mediaDomainName = "//bizweb.dktcdn.net/";
const currencies = {
    VND: "vi-VN",
    USD: "en-US",
    EUR: "de-DE",
    GBP: "en-GB",
    JPY: "ja-JP",
    SGD: "zh-SG",
    KRW: "ko-KR",
    THB: "th-TH",
    CNY: "zh-CN",
    AUD: "en-AU",
    HUF: "hu-HU",
    SEK: "sv-SE",
    CHF: "fr-CH",
    NZD: "en-NZ",
    TWD: "zh-TW",
    CAN: "en-CA"
};
const throttle = (c, d) => {
    let e;
    return function() {
        const f = arguments;
        const g = this;
        if (!e) {
            c["apply"](g, f);
            e = !![];
            setTimeout(() => (e = ![]), d);
        }
    };
};
String.prototype.slugify = function() {
    return this.toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/[đĐ]/g, "d")
        .replace(/([^0-9a-z-\s])/g, "")
        .replace(/(\s+)/g, "-")
        .replace(/-+/g, "-")
        .replace(/^-+|-+$/g, "");
};
String.prototype.imgUrl = function(t) {
    let i = this.match(
        /thumb\/(1024x1024|2048x2048|pico|icon|thumb|small|compact|medium|large|grande)\//
    );
    return null === i
        ? "original" === t
            ? this.toString().replace(i[0], "")
            : this.replace(
                  "//bizweb.dktcdn.net/",
                  `//bizweb.dktcdn.net/thumb/${t}/`
              )
        : i[1] === t
        ? this.toString()
        : "original" === t
        ? this.toString().replace(i[0], "")
        : this.toString().replace(i[0], `thumb/${t}/`);
};
var stopAllYouTubeVideos = () => {
    var e = document.querySelectorAll("iframe");
    Array.prototype.forEach.call(e, e => {
        e.contentWindow.postMessage(
            JSON.stringify({ event: "command", func: "stopVideo" }),
            "*"
        );
    });
};
