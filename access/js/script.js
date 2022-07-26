(function (window) {
    'use strict';
    $(document).on('submit', '.js-review-add', function (e) {
        e.preventDefault();
        let $listContainer = $('.js-list-body'),
            $errorContainer = $('.js-add-error'),
            $form = $(this),
            $data = $form.serialize();
        $errorContainer.text('');
        $.ajax({
            url: "/api/v1/reviews.php",
            data: $data,
            method: "post",
            dataType: "json",
            success: function ($response) {
                console.log($response);
                if ($response.error) {
                    $errorContainer.text($response.message);
                } else {
                    if ($response.items) {
                        let html = '';
                        $response.items.forEach(({name, email, body}) => {
                            html += `
                            <tr>
                                <td>${name}</td>
                                <td>${email}</td>
                                <td>${body}</td>
                            </tr>
                            `;
                        });
                        $listContainer.html(html);
                        $errorContainer.text('Запись успешно добавлена');
                    }
                }
            }
        });
        console.log($data);
    })
})(window)
