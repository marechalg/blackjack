function toCamel(input: string): string {
    let splitted: string[] = input.split(' ');
    let rebuild: string = '';
    splitted.forEach((split, index) => {
        split = split.toLowerCase();
        if (index !== 0) split = split.charAt(0).toUpperCase() + split.slice(1);
        rebuild = rebuild.concat(split);
    })
    return rebuild;
}