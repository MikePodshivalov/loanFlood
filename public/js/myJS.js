function showDivWithPath(name) {
    $('#checkbox-' + name).click(function(){
        if ($(this).is(':checked')){
            $('#path-' + name).show(100);
        } else {
            $('#path-' + name).hide(100);
            $('#text-path-' + name).val('');
        }
    });
}
showDivWithPath('zs');
showDivWithPath('pd');
showDivWithPath('ukk');
showDivWithPath('iab');


async function copyPathToBuffer(path) {
    await navigator.clipboard.writeText(path);
}

$('.a-tooltip').tooltip();
