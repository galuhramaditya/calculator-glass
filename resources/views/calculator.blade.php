<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Calculator Glass">
    <meta name="author" content="galuh.ramaditya.@gmail.com">
    <meta name="keyword" content="Calculator, Glass, Calculator Glass">

    <title>{{env("APP_NAME")}}</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">

</head>

<body>
    <div id="preloader">
        <div id="loader"></div>
    </div>
    <div class="container" id="app" vue-data="app">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    {{env("APP_NAME")}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body calculator" vue-data="calculator">
                        <div class="row material" v-for="i in component">
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="form-control" name="material" data-live-search="true" v-on:change="change_component(event)">
                                        <option value="0" selected hidden>Select Material</option>
                                        <option v-for="material in _.sortBy(materials, 'name')" :value="material.valor_per_ton">@{{_.toUpper(material.name)}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="number" name="qty" min="0" class="form-control" placeholder="Quantity" v-on:keyup="change_component(event)">
                                    <input type="hidden" name="total" value="0">
                                    <input type="hidden" name="add" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer" vue-data="total">
                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    Qty : @{{total_quantity}}
                                </div>
                                <div class="col-8 text-right">
                                    Price : IDR @{{total.toLocaleString()}} / kg
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary reset float-right" v-on:click="reset()" vue-data="reset"><i class="fa fa-repeat"></i></a>
            </div>
        </div>
    </div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/bootstrap-select.min.js"></script>
    <script src="/assets/js/vue.min.js"></script>
    <script src="/assets/js/lodash.js"></script>
    <script src="/assets/js/main.js"></script>

</body>

</html>