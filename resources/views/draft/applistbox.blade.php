<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>jQuery transfer</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('icon_font/css/icon_font.css') }}s" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.transfer.css') }}" />
    <style>
        .transfer-demo {
            width: 640px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div>

        <div id="transfer1" class="transfer-demo"></div>
        <div id="transfer2" class="transfer-demo"></div>
        <div id="transfer3" class="transfer-demo"></div>
        <div id="transfer4" class="transfer-demo"></div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.transfer.js') }}"></script>
<script type="text/javascript">
    var dataArray1 = {!! $province !!};

    var settings1 = {
        "dataArray": dataArray1,
        "itemName": "name",
        "valueName": "id",
        "callable": function (items) {
            console.dir(items)
        }
    };

    $("#transfer1").transfer(settings1);
</script>

<script>

    var dataArray2 = [
        {
            "city": "Beijing",
            "value": 132,
            "disabled": true
        },
        {
            "city": "Shanghai",
            "value": 422,
            "selected": true
        },
        {
            "city": "Chengdu",
            "value": 232
        },
        {
            "city": "Wuhan",
            "value": 765,
            "selected": true,
            "disabled": true
        },
        {
            "city": "Tianjin",
            "value": 876
        },
        {
            "city": "Guangzhou",
            "value": 453
        },
        {
            "city": "Hongkong",
            "value": 125
        }
    ];

    var settings2 = {
        "dataArray": dataArray2,
        "itemName": "city",
        "valueName": "value",
        "callable": function (items) {
            console.dir(items)
        }
    };

    $("#transfer2").transfer(settings2);
</script>

<script>
    var groupDataArray1 = @json($provinces);

    var settings3 = {
        "groupDataArray": groupDataArray1,
        "groupItemName": "name",
        "groupArrayName": "regency",
        "itemName": "name",
        "valueName": "id",
        "callable": function (items) {
            console.dir(items)
        }
    };

    $("#transfer3").transfer(settings3);
</script>

<script>
var groupDataArray2 = [
        {
            "groupName": "China",
            "groupData": [
                {
                    "city": "Beijing",
                    "value": 122,
                    "selected": true
                },
                {
                    "city": "Shanghai",
                    "value": 643,
                    "disabled": true
                },
                {
                    "city": "Qingdao",
                    "value": 422
                },
                {
                    "city": "Tianjin",
                    "value": 622
                }
            ]
        },
        {
            "groupName": "Japan",
            "groupData": [
                {
                    "city": "Tokyo",
                    "value": 132,
                    "selected": true
                },
                {
                    "city": "Osaka",
                    "value": 112,
                    "selected": true
                },
                {
                    "city": "Yokohama",
                    "value": 191,
                    "selected": true
                }
            ]
        }
    ];

    var settings4 = {
        "groupDataArray": groupDataArray2,
        "groupItemName": "groupName",
        "groupArrayName": "groupData",
        "itemName": "city",
        "valueName": "value",
        "callable": function (items) {
            console.dir(items)
        }
    };

    var transfer = $("#transfer4").transfer(settings4);
    // get selected items
    var items = transfer.getSelectedItems()
    console.log("Manually get selected items: %o", items);
</script>
</html>
