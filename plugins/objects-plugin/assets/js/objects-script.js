var $ = jQuery.noConflict();
jQuery(document).ready(function ($) {

    var currentPageEl = $(".current-page");
    var totalPageEl = $(".total-pages");
    var currentPage = 1;
    var totalPages = 1;

    var filterValues = {
        cat: 'all',
        title: '',
        address: '',
        floor: '',
        type: '',
        ecology: '',
        square: '',
        roomsAmount: '',
        balcony: '',
        bathroom: ''
    };

    var prevValues = {
        cat: 'all',
        title: '',
        address: '',
        floor: '',
        type: '',
        ecology: '',
        square: '',
        roomsAmount: '',
        balcony: '',
        bathroom: ''
    };

    function showLoader() {
        $(".filter_loader").show();
        $('.filter').addClass('loading-overlay');
    }

    function hideLoader() {
        $(".filter_loader").hide();
        $('.filter').removeClass('loading-overlay');
    }

    hideLoader();

    function updatePaginationButtons() {
        $(".prev").prop("disabled", currentPage === 1);
        $(".next").prop("disabled", currentPage === totalPages);
    }

    function updateCurrentPage() {
        currentPageEl.html(currentPage);
    }

    function loadPosts(page, values) {
        $.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: $.extend({
                action: "ajax_get_objects",
                nonce: ajax_object.nonce,
                page: page
            }, values),
            beforeSend: showLoader,
            success: function (response) {
                hideLoader();
                filterValues.cat = response.cat;
                filterValues.title = response.title;
                filterValues.address = response.address;
                filterValues.floor = response.floor;
                filterValues.type = response.type;
                filterValues.ecology = response.ecology;
                filterValues.square = response.square;
                filterValues.roomsAmount = response.roomsAmount;
                filterValues.balcony = response.balcony;
                filterValues.bathroom = response.bathroom;
                totalPages = response.totalPages;
                totalPageEl.html(totalPages);
                $("#objects__container").html(response.html);
                $("#pagination").toggleClass("hidden", totalPages <= 1);
                updatePaginationButtons();
            },
            error: function (xhr, status, error) {
                hideLoader();
                console.error("Request failed: " + error);
            }
        });
    }

    $('#form').on('submit', function (e) {
        e.preventDefault();

        var newValues = {
            cat: $('#cat').val(),
            title: $('#title').val(),
            address: $('#address').val(),
            floor: $('#floor').val(),
            type: $('#type').val(),
            ecology: $('#ecology').val(),
            square: $('#square').val(),
            roomsAmount: $('#rooms_amount').val(),
            balcony: $('#balcony').val(),
            bathroom: $('#bathroom').val()
        };

        if (JSON.stringify(newValues) !== JSON.stringify(prevValues)) {
            currentPage = 1;
            prevValues = {
                cat: newValues.cat,
                title: newValues.title,
                address: newValues.address,
                floor: newValues.floor,
                type: newValues.type,
                ecology: newValues.ecology,
                square: newValues.square,
                roomsAmount: newValues.roomsAmount,
                balcony: newValues.balcony,
                bathroom: newValues.bathroom
            };
        }

        filterValues = newValues;
        loadPosts(currentPage, filterValues);
        updateCurrentPage();
        $(".objects__block").removeClass("hidden");
    });

    $(".next").click(function () {
        if (currentPage < totalPages) {
            currentPage++;
            loadPosts(currentPage, filterValues);
            updateCurrentPage();
        }
    });

    $(".prev").click(function () {
        if (currentPage > 1) {
            currentPage--;
            loadPosts(currentPage, filterValues);
            updateCurrentPage();
        }
    });

});