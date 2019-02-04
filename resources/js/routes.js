/**
 * Created by designer on 24-Oct-18.
 */
var routes = require('./routes.json');

export default function() {
    var args = Array.prototype.slice.call(arguments);
    var name = args.shift();

    if (routes[name] === undefined) {
        console.error('Unknown route ', name);
    } else {
        return '/' + routes[name]
            .split('/')
            .map(s => s[0] == '{' ? args.shift() : s).join('/');
    }
};