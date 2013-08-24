function addHit(url)
{
    $.ajax({
        type: "POST",
        url: url,
    });
}