"use strict";
$(document).ready(function(){
	

    $('input[name="daterange"]').daterangepicker();
    $(function() {
        $('input[name="birthdate"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        },
        function(start, end, label) {
            var years = moment().diff(start, 'years');
            alert("You are " + years + " years old.");
        });

        $('input[name="datefilter"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            "drops": "up",
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

        $('.input-daterange input').each(function() {
            $(this).datepicker();
        });
        $('#sandbox-container .input-daterange').datepicker({
            todayHighlight: true
        });
        $('.input-group-date-custom').datepicker({
            todayBtn: true,
            clearBtn: true,
            keyboardNavigation: false,
            forceParse: false,
            todayHighlight: true,
            defaultViewDate: {
                year: '2017',
                month: '01',
                day: '01'
            }
        });
        $('.multiple-select').datepicker({
            todayBtn: true,
            clearBtn: true,
            multidate: true,
            keyboardNavigation: false,
            forceParse: false,
            todayHighlight: true,
            defaultViewDate: {
                year: '2017',
                month: '01',
                day: '01'
            }
        });
        $('#config-demo').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "timePickerSeconds": true,
            "showCustomRangeLabel": false,
            "alwaysShowCalendars": true,
            "startDate": "11/30/2016",
            "endDate": "12/06/2016",
            "drops": "up"
        }, function(start, end, label) {
            console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        });
    });

// Date-dropper js start

$("#dropper-default").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b"
    }),
$("#dropper-animation").dateDropper( {
        dropWidth: 200,
        init_animation: "bounce",
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b"
    }),
$("#dropper-format").dateDropper( {
        dropWidth: 200,
        format: "F S, Y",
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b"
    }),
$("#dropper-lang").dateDropper( {
        dropWidth: 200,
        format: "F S, Y",
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        lang: "ar"
    }),
$("#dropper-lock").dateDropper( {
        dropWidth: 200,
        format: "F S, Y",
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        lock: "from"
    }),
$("#dropper-max-year").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        maxYear: "2020"
    }),
$("#dropper-min-year").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        minYear: "1990"
    }),
$("#year-range").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        yearsRange: "5"
    }),
$("#dropper-width").dateDropper( {
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        dropWidth: 500
    }),
$("#dropper-dangercolor").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#e74c3c",
        dropBorder: "1px solid #e74c3c",
    }),
$("#dropper-backcolor").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        dropBackgroundColor: "#bdc3c7"
    }),
$("#dropper-txtcolor").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#46627f",
        dropBorder: "1px solid #46627f",
        dropTextColor: "#FFF",
        dropBackgroundColor: "#e74c3c"
    }),
$("#dropper-radius").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        dropBorderRadius: "0"
    }),
$("#dropper-border").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "2px solid #0d665b"
    }),
$("#dropper-shadow").dateDropper( {
        dropWidth: 200,
        dropPrimaryColor: "#0d665b",
        dropBorder: "1px solid #0d665b",
        dropBorderRadius: "20px",
        dropShadow: "0 0 20px 0 rgba(26, 188, 156, 0.6)"
    })
// Date-dropper js end

// Color picker js start
function change_checkbox_color() {
    $('.color-box .show-box').on('click', function() {
        $(".color-box").toggleClass("open");
    });

    $('.colors-list a').on('click', function() {
        var curr_color = $('main').data('checkbox-color');
        var color = $(this).data('checkbox-color');
        var new_colot = 'checkbox-' + color;

        $('.rkmd-checkbox .input-checkbox').each(function(i, v) {
            var findColor = $(this).hasClass(curr_color);

            if (findColor) {
                $(this).removeClass(curr_color);
                $(this).addClass(new_colot);
            }

            $('main').data('checkbox-color', new_colot);

        });
    });
}
// Color picker
$("#custom").spectrum({
    color: "#f00"
});
$("#flat").spectrum({
    flat: true,
    showInput: true
});
$("#flatClearable").spectrum({
    flat: true,
    showInput: true,
    allowEmpty: true
});
// Color picker js end

// Mini-color js start
$('.demo').each( function() {
                //
                // Dear reader, it's actually very easy to initialize MiniColors. For example:
                //
                //  $(selector).minicolors();
                //
                // The way I've done it below is just for the demo, so don't get confused
                // by it. Also, data- attributes aren't supported at this time...they're
                // only used for this demo.
                //
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-defaultValue') || '',
                    format: $(this).attr('data-format') || 'hex',
                    keywords: $(this).attr('data-keywords') || '',
                    inline: $(this).attr('data-inline') === 'true',
                    letterCase: $(this).attr('data-letterCase') || 'lowercase',
                    opacity: $(this).attr('data-opacity'),
                    position: $(this).attr('data-position') || 'bottom left',
                    swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
                    change: function(value, opacity) {
                        if( !value ) return;
                        if( opacity ) value += ', ' + opacity;
                        if( typeof console === 'object' ) {
                            console.log(value);
                        }
                    },
                    theme: 'bootstrap'
                });

            });
// Mini-color js ends
});
