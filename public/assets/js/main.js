var app = new Vue({
    el: "#app",
    data: {
        data: "asd",
        materials: null,
        total: 0,
        total_quantity: 0,
        component: 1
    },
    methods: {
        refresh_material: function() {
            $.ajax({
                type: "get",
                url: "/material/data",
                success: function(response) {
                    app.materials = response.data;
                    $("select").selectpicker("refresh");
                    $("#preloader").fadeOut("slow", function() {
                        $("[vue-data=app]").fadeIn("slow");
                        $("[vue-data=calculator]").slideDown(
                            "slow",
                            function() {
                                $("[vue-data=total]").slideDown("slow");
                            }
                        );
                    });
                }
            });
        },
        refresh_total: function() {
            app.total = 0;
            $("input[name=total]").each(function() {
                var val = $(this).val();
                app.total += parseFloat(val);
            });
        },
        refresh_total_quantity: function() {
            app.total_quantity = 0;
            $("input[name=qty]").each(function() {
                var val = $(this).val();
                app.total_quantity += val == "" ? 0 : parseFloat(val);
            });
        },
        change_component: function(event) {
            var parent = $(event.target).parents(".row:first");
            if (event.target.localName == "input") {
                var valor = parseFloat(parent.find("select").val());
                var qty = $(event.target).val();
            } else {
                var valor = parseFloat($(event.target).val());
                var qty = parent.find("input[name=qty]").val();
            }
            qty == "" ? 0 : parseFloat(qty);
            parent.find("input[name=total]").val((valor * qty) / 100);
            parent.find("input[name=add]").val(1);
            app.refresh_total();
            app.refresh_total_quantity();
            app.add_component();
            $("select").selectpicker("refresh");
        },
        add_component: function() {
            var empty = true;

            $("input[name=add]").each(function() {
                $(this).val() == 0
                    ? (empty = empty && false)
                    : (empty = empty && true);
            });

            if (empty) {
                app.component++;
            }
        },
        reset: function() {
            $("[vue-data=calculator]").slideUp("slow", function() {
                app.component = 0;
                $("[vue-data=total]").slideUp("slow", function() {
                    app.total = app.total_quantity = 0;
                    app.component = 1;
                    $("[vue-data=total]").slideDown("slow", function() {
                        $("[vue-data=calculator]").slideDown("slow");
                    });
                });
            });
        }
    }
});

$(document).ready(function() {
    app.refresh_material();
});
