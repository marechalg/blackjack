"use strict";
function toCamel(input) {
    let splitted = input.split(' ');
    let rebuild = '';
    splitted.forEach((split, index) => {
        split = split.toLowerCase();
        if (index !== 0)
            split = split.charAt(0).toUpperCase() + split.slice(1);
        rebuild = rebuild.concat(split);
    });
    return rebuild;
}
//# sourceMappingURL=scripts.js.map