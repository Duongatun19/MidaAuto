!function(t){"use strict";function e(){var e=this;e.reads=[],e.writes=[],e.raf=u.bind(t)}function n(t){t.scheduled||(t.scheduled=!0,t.raf(i.bind(null,t)))}function i(t){var e,i=t.writes,o=t.reads;try{o.length,r(o),i.length,r(i)}catch(t){e=t}if(t.scheduled=!1,(o.length||i.length)&&n(t),e){if(e.message,!t.catch)throw e;t.catch(e)}}function r(t){for(var e;e=t.shift();)e()}function o(t,e){var n=t.indexOf(e);return!!~n&&!!t.splice(n,1)}function s(t,e){for(var n in e)e.hasOwnProperty(n)&&(t[n]=e[n])}var u=t.requestAnimationFrame||t.webkitRequestAnimationFrame||t.mozRequestAnimationFrame||t.msRequestAnimationFrame||function(t){return setTimeout(t,16)};e.prototype={constructor:e,measure:function(t,e){var i=e?t.bind(e):t;return this.reads.push(i),n(this),i},mutate:function(t,e){var i=e?t.bind(e):t;return this.writes.push(i),n(this),i},clear:function(t){return o(this.reads,t)||o(this.writes,t)},extend:function(t){if("object"!=typeof t)throw new Error("expected object");var e=Object.create(this);return s(e,t),e.fastdom=this,e.initialize&&e.initialize(),e},catch:null};var exports=t.fastdom=t.fastdom||new e;"function"==typeof define?define(function(){return exports}):"object"==typeof module&&(module.exports=exports)}("undefined"!=typeof window?window:this);