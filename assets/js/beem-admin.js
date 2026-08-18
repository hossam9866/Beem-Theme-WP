jQuery(function ($) {
    const orderList = $('#beem-section-order');
    const orderInput = $('#beem-section-order-field');

    if (orderList.length) {
        orderList.sortable({
            update: function () {
                const values = [];
                orderList.find('li').each(function () {
                    values.push($(this).data('section'));
                });
                orderInput.val(values.join(','));
            },
        });
        orderInput.val(orderList.children('li').map(function () {
            return $(this).data('section');
        }).get().join(','));
    }

    const subject = $('[name="reply_subject"]');
    const message = $('[name="reply_message"]');
    const preview = $('#beem-email-preview');
    function drawPreview() {
        if (!subject.length || !message.length || !preview.length) {
            return;
        }
        const safeSubject = $('<div>').text(subject.val() || 'Subject').html();
        const safeBody = $('<div>').text(message.val() || '').html().replace(/\n/g, '<br>');
        preview.html(
            '<strong>Subject:</strong> ' + safeSubject + '<br><br>' +
            '<div style="border:1px solid #d7e0e5;padding:8px;border-radius:8px;">' + safeBody + '</div>'
        );
    }
    subject.on('input', drawPreview);
    message.on('input', drawPreview);
    drawPreview();
});
