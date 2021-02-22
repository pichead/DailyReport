getPagination('#table-id');
//getPagination('.table-class');
//getPagination('table');



function getPagination(table) {
    var lastPage = 1;

    $('#maxRows')
        .on('change', function (evt) {
            //$('.jqpaginationprev').html('');						// reset pagination

            lastPage = 1;
            $('.jqpagination')
                .find('li')
                .slice(1, -1)
                .remove();
            var trnum = 0; // reset tr counter
            var maxRows = parseInt($(this).val()); // get Max Rows from select option

            if (maxRows == 5000) {
                $('.jqpagination').hide();
            } else {
                $('.jqpagination').show();
            }

            var totalRows = $(table + ' tbody tr').length; // numbers of rows
            $(table + ' tr:gt(0)').each(function () {
                // each TR in  table and not the header
                trnum++; // Start Counter
                if (trnum > maxRows) {
                    // if tr number gt maxRows

                    $(this).hide(); // fade it out
                }
                if (trnum <= maxRows) {
                    $(this).show();
                } // else fade in Important in case if it ..
            }); //  was fade out to fade it in
            if (totalRows > maxRows) {
                // if tr total rows gt max rows option
                var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                //	numbers of pages
                for (var i = 1; i <= pagenum;) {
                    // for each page append pagination li
                    $('.jqpagination #prev')
                        .before(
                            '<li data-page="' +
                            i +
                            '">\
              <span>' +
                            i++ +
                            '<span class="sr-only">(current)</span></span>\
            </li>'
                        )
                        .show();
                } // end for i
            } // end if row count > max rows
            $('.jqpagination [data-page="1"]').addClass('active'); // add active class to the first li
            $('.jqpagination li').on('click', function (evt) {
                // on click each page
                evt.stopImmediatePropagation();
                evt.preventDefault();
                var pageNum = $(this).attr('data-page'); // get it's number

                var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                if (pageNum == 'prev') {
                    if (lastPage == 1) {
                        return;
                    }
                    pageNum = --lastPage;
                }
                if (pageNum == 'next') {
                    if (lastPage == $('.jqpagination li').length - 2) {
                        return;
                    }
                    pageNum = ++lastPage;
                }

                lastPage = pageNum;
                var trIndex = 0; // reset tr counter
                $('.jqpagination li').removeClass('active'); // remove active class from all li
                $('.jqpagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                // $(this).addClass('active');					// add active class to the clicked
                limitPagging();
                $(table + ' tr:gt(0)').each(function () {
                    // each tr in table not the header
                    trIndex++; // tr index counter
                    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                    if (
                        trIndex > maxRows * pageNum ||
                        trIndex <= maxRows * pageNum - maxRows
                    ) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    } //else fade in
                }); // end of for each tr in table
            }); // end of on click pagination list
            limitPagging();
        })
        .val(10)
        .change();

    // end of on select change

    // END OF PAGINATION
}

function limitPagging() {
    // alert($('.jqpagination li').length)

    if ($('.jqpagination li').length > 7) {
        if ($('.jqpagination li.active').attr('data-page') <= 3) {
            $('.jqpagination li:gt(5)').hide();
            $('.jqpagination li:lt(5)').show();
            $('.jqpagination [data-page="next"]').show();
        } if ($('.jqpagination li.active').attr('data-page') > 3) {
            $('.jqpagination li:gt(0)').hide();
            $('.jqpagination [data-page="next"]').show();
            for (let i = (parseInt($('.jqpagination li.active').attr('data-page')) - 2); i <= (parseInt($('.jqpagination li.active').attr('data-page')) + 2); i++) {
                $('.jqpagination [data-page="' + i + '"]').show();

            }

        }
    }
}

// $(function () {
//     // Just to append id number for each row
//     $('table tr:eq(0)').prepend('<th> ID </th>');

//     var id = 0;

//     $('table tr:gt(0)').each(function () {
//         id++;
//         $(this).prepend('<td>' + id + '</td>');
//     });
// });

//  Developed By Yasser Mas
// yasser.mas2@gmail.com
