function checkEmoji(e) {

    var c = document.createElement("canvas")
    var ctx = c.getContext("2d");
    const em = 16;
    c.width = em;
    c.height = em;


    ctx.clearRect(0, 0, em, em);
    ctx.fillText(e, 0, em);
    let emo = c.toDataURL()

    ctx.clearRect(0, 0, em, em);
    ctx.fillText('\uFFFF', 0, em);
    let bad1 = c.toDataURL()
    ctx.clearRect(0, 0, em, em);
    ctx.fillText('\uFFFF\uFFFF', 0, em);
    let bad2 = c.toDataURL()

    return (emo !== bad1) && (emo !== bad2)
}