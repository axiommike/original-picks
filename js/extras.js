$(document).ready(function () {
    $('td').each(function () {
        const text = $(this).text().trim();
        if (text === 'UFA' || text === 'RFA') {
            const bgColor = text === 'UFA' ? 'red' : 'blue';
            $(this).html(
                `<span style="
                    background-color: ${bgColor};
                    color: white;
                    padding: 2px 8px;
                    border-radius: 8px;
                    display: inline-block;
                    text-align: center;
                    min-width: 20px;
                    margin: 1;
                    line-height: 1;
                ">${text}</span>`
            );
            $(this).css('text-align', 'center');
        }
    });
});
