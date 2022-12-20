export default function countCalc () {

    $("input[name='car_id']").change(function () {
        $("#submit").attr("disabled", false);
    });

    function updateTotal(){
        var basic = 0;
        var add = 0;
        var form = document.getElementById('form-three');
        var checkboxes = form.getElementsByClassName('addon');  

        for (var i=0; i < checkboxes.length; i ++) {
            if (checkboxes[i].checked) {
                add += parseInt(checkboxes[i].value, 10);
            }
        }

        var p = basic + add;
        var price = p + " zł"; 
        var price_input = p; 
        document.getElementById('total').innerHTML = price;  
        document.getElementById('input-total').defaultValue = price_input;
    }

    document.getElementById('form-three').addEventListener('change', updateTotal);

    updateTotal();

}