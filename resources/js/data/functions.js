

export function searchSlugRecord(array, sl){
    var x = null;
    array.forEach(element => {
        if(element.slug === sl)
            x = element;
    });
    return x;
}