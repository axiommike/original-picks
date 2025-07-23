$(document).ready(function () {
    $('td').each(function () {
        const text = $(this).text().trim();

        // Determine background color
        let bgColor = null;
        if (text === 'UFA') bgColor = 'red';
        else if (text === 'RFA') bgColor = 'blue';
        else if (text === 'Retained') bgColor = 'grey';
        else if (text === 'Buyout') bgColor = 'black';

        // Apply style if matched
        if (bgColor) {
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
