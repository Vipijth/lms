
<?php
include("header.php");
include ("connection.php");
$uid=$_SESSION['userid'];
$subid=$_POST["csid"];
$subname = $_POST["subname"];
$userid = $_POST["userid"];
$useremail = $_POST["useremail"];
$type = $_POST["subtype"];
$amount =  $_POST["amount"];

?>

<script>
    window.onload = function() {
        var d = new Date().getTime();
        document.getElementById("tid").value = d;
    };
</script>
<div class="container-fluid" style="padding-top: 100px">
    <div class="row justify-content-md-center ">

        <div class="col-md-8 col-lg-7" style="background:#eee;height:auto"  >

            <font style="color:red; font-size:45px; font-family:Segoe UI semibold">
                &nbsp;&nbsp;Shopping Cart

            </font>
            <br><br style="line-height:.8">


            <div class="row justify-content-md-center ">
                <table style="height:auto; width:100% ;">
                    <tr  style="border-bottom:2px solid #afafaf">
                        <td style="width:10%;height:40px;">

                        </td>

                        <td style="width:25%;height:40px;">
                            <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                                &nbsp;&nbsp;Category
                        </td>

                        <td style="width:35%;height:40px;">
                            <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                                &nbsp;&nbsp;Product Name
                            </font>
                        </td>

                        <td style="width:20%;height:40px;">
                            <font style="color:green; font-size:20px; font-family:Segoe UI semibold">
                                &nbsp;&nbsp;Amount
                            </font>
                        </td>

                        <td style="width:10%;height:40px;">

                        </td>

                    </tr>

                            <tr>
                                <td style="width:10%;height:40px;">
                                    <center>




                                </td>
                                <td style="width:25%;height:40px;">
                                    <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold">
                                        <?php echo $type?>
                                    </font>


                                </td>
                                <td style="width:35%;height:40px;">
                                    <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold; text-transform:capitalize">
                                        <?php echo $subname?>
                                    </font>
                                </td>
                                <td style="width:20%;height:40px;">
                                    <font style="color:#707070; font-size:18px;font-family:Segoe UI semibold; text-transform:capitalize">
                                        <?php echo $amount ?>
                                    </font>
                                </td>


                            </tr>



                </table>


            </div>
        </div>



        <div class="col-md-8 col-lg-4" style="background:#eee;height:500px"  >

            <br><br> <br><br>
            <div class="row justify-content-md-center ">

                <?php

                    $_SESSION["cartid2"] = $subid ;
                    $_SESSION["am2"] =$amount;

                $im = str_replace(' ', '', $subid);
    $am=$amount;;
$order='Order'.date("Ym").$im.$uid.date("d");
                    $_SESSION["orderid2"] = $order;
                    $_SESSION["cat2"] = $type;
                    $_SESSION["sub2"] = $subname;


                    //ccavRequestHandler.php
                    ?>
                    <div class="col-md-9" style="height:auto;background:white;border-radius:20px;padding-right:16px;  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);"  >
                        <form method="POST" name="customerData" action="ccavRequestHandler.php">

                            <font style="color:#000; font-size:25px;font-family:Segoe UI semibold">
                                <br style="line-height:.8">

                                Product Order ID
                                <center>
                                    <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                                </center>
                                <small><small>

                                        <?php echo $order ?>
                                    </small></small>

                                <br style="line-height:.3">

                                Total Amount

                                <center>
                                    <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                                </center>

                                <small><small>

                                        &#8377; <?php echo $am ?>
                                    </small></small>
                                <br style="line-height:.7">
                                <!--Apply Coupon

                                        <center>
                                            <hr/ style="  border-top: 1px solid #afafaf;width:92%">
                                        </center>
                                        <input type="text" style="height:30px;box-shadow:2px 2px 2px 2px #afafaf;text-align:center; width:40%;font-size:12px; border-radius:20px;color:#afafaf" placeholder="Add Coupon Code">
                                            &nbsp;&nbsp;
                                                <button style="height:30px;text-align:center; width:30%; font-size:18px;border-radius:20px;color:#fff; background:orange;border:none">

                                                        APPLY
                                                    </button>
                                                    <br style="line-height:.2">-->

                                Grand Total

                                <center>
                                    <hr/ style=" border-top: 1px solid #afafaf;width:92%">
                                </center>
                                <small><small>

                                        &#8377; <?php echo $am ?>
                                    </small></small>
                                <br><br>
                                <input type="hidden" name="tid" id="tid"  />

                                <input type="hidden" name="merchant_id" value="317978"/>

                                <input type="hidden" name="order_id" value="<?php echo $order ?>"/>

                                <input type="hidden" name="amount" value="<?php echo $am ?>"/>

                                <input type="hidden" name="currency" value="INR" />
                                <input type="hidden" name="redirect_url" value="http://localhost/newchrys/ccavResponseHandler.php"/>

                                <input type="hidden" name="cancel_url" value="http://localhost/newchrys/ccavResponseHandler.php"/>

                                <input type="hidden" name="language" value="EN"/>




                                <center>
                                    <button style="border:none;height:50px; width:80%; font-size:24px;color:#fff; background:#EB4C5E" onclick="return confirm('Do you want to purchase?');" >
                                        &nbsp;CHECKOUT&nbsp;&nbsp;
                                    </button>
                                </center>
                        </form>
                        <br>
                    </div>





            </div>
        </div>
    </div>
</div>

<br>
<br>


<script language="javascript" type="text/javascript" src="json.js"></script>
<script src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
    $(function(){

        /* json object contains
            1) payOptType - Will contain payment options allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
            2) cardType - Will contain card type allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
            3) cardName - Will contain name of card. E.g. Visa, MasterCard, American Express or and bank name in case of Net banking.
            4) status - Will help in identifying the status of the payment mode. Options may include Active or Down.
            5) dataAcceptedAt - It tell data accept at CCAvenue or Service provider
            6)error -  This parameter will enable you to troubleshoot any configuration related issues. It will provide error description.
        */
        var jsonData;
        var access_code="" // shared by CCAVENUE
        var amount="6000.00";
        var currency="INR";

        $.ajax({
            url:'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,
            dataType: 'jsonp',
            jsonp: false,
            jsonpCallback: 'processData',
            success: function (data) {
                jsonData = data;
                // processData method for reference
                processData(data);
                // get Promotion details
                $.each(jsonData, function(index,value) {
                    if(value.Promotions != undefined  && value.Promotions !=null){
                        var promotionsArray = $.parseJSON(value.Promotions);
                        $.each(promotionsArray, function() {
                            console.log(this['promoId'] +" "+this['promoCardName']);
                            var	promotions=	"<option value="+this['promoId']+">"
                                +this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";
                            $("#promo_code").find("option:last").after(promotions);
                        });
                    }
                });
            },
            error: function(xhr, textStatus, errorThrown) {
                alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));
                //console.log("Error occured");
            }
        });

        $(".payOption").click(function(){
            var paymentOption="";
            var cardArray="";
            var payThrough,emiPlanTr;
            var emiBanksArray,emiPlansArray;

            paymentOption = $(this).val();
            $("#card_type").val(paymentOption.replace("OPT",""));
            $("#card_name").children().remove(); // remove old card names from old one
            $("#card_name").append("<option value=''>Select</option>");
            $("#emi_div").hide();

            //console.log(jsonData);
            $.each(jsonData, function(index,value) {
                //console.log(value);
                if(paymentOption !="OPTEMI"){
                    if(value.payOpt==paymentOption){
                        cardArray = $.parseJSON(value[paymentOption]);
                        $.each(cardArray, function() {
                            $("#card_name").find("option:last").after("<option class='"+this['dataAcceptedAt']+" "+this['status']+"'  value='"+this['cardName']+"'>"+this['cardName']+"</option>");
                        });
                    }
                }

                if(paymentOption =="OPTEMI"){
                    if(value.payOpt=="OPTEMI"){
                        $("#emi_div").show();
                        $("#card_type").val("CRDC");
                        $("#data_accept").val("Y");
                        $("#emi_plan_id").val("");
                        $("#emi_tenure_id").val("");
                        $("span.emi_fees").hide();
                        $("#emi_banks").children().remove();
                        $("#emi_banks").append("<option value=''>Select your Bank</option>");
                        $("#emi_tbl").children().remove();

                        emiBanksArray = $.parseJSON(value.EmiBanks);
                        emiPlansArray = $.parseJSON(value.EmiPlans);
                        $.each(emiBanksArray, function() {
                            payThrough = "<option value='"+this['planId']+"' class='"+this['BINs']+"' id='"+this['subventionPaidBy']+"' label='"+this['midProcesses']+"'>"+this['gtwName']+"</option>";
                            $("#emi_banks").append(payThrough);
                        });

                        emiPlanTr="<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";

                        $.each(emiPlansArray, function() {
                            emiPlanTr=emiPlanTr+
                                "<tr class='tenuremonth "+this['planId']+"' id='"+this['tenureId']+"' style='display: none'>"+
                                "<td> <input type='radio' name='emi_plan_radio' id='"+this['tenureMonths']+"' value='"+this['tenureId']+"' class='emi_plan_radio' > </td>"+
                                "<td>"+this['tenureMonths']+ "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>"+this['processingFeePercent']+"</label>&nbsp;%p.a</label>"+
                                "</td>"+
                                "<td>"+this['currency']+"&nbsp;"+this['emiAmount'].toFixed(2)+
                                "</td>"+
                                "<td><label class='currency'>"+this['currency']+"</label>&nbsp;"+
                                "<label class='emiTotal'>"+this['total'].toFixed(2)+"</label>"+
                                "<label class='emi_processing_fee_plan' style='display: none;'>"+this['emiProcessingFee'].toFixed(2)+"</label>"+
                                "<label class='planId' style='display: none;'>"+this['planId']+"</label>"+
                                "</td>"+
                                "</tr>";
                        });
                        $("#emi_tbl").append(emiPlanTr);
                    }
                }
            });

        });


        $("#card_name").click(function(){
            if($(this).find(":selected").hasClass("DOWN")){
                alert("Selected option is currently unavailable. Select another payment option or try again later.");
            }
            if($(this).find(":selected").hasClass("CCAvenue")){
                $("#data_accept").val("Y");
            }else{
                $("#data_accept").val("N");
            }
        });

        // Emi section start
        $("#emi_banks").live("change",function(){
            if($(this).val() != ""){
                var cardsProcess="";
                $("#emi_tbl").show();
                cardsProcess=$("#emi_banks option:selected").attr("label").split("|");
                $("#card_name").children().remove();
                $("#card_name").append("<option value=''>Select</option>");
                $.each(cardsProcess,function(index,card){
                    $("#card_name").find("option:last").after("<option class=CCAvenue value='"+card+"' >"+card+"</option>");
                });
                $("#emi_plan_id").val($(this).val());
                $(".tenuremonth").hide();
                $("."+$(this).val()+"").show();
                $("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked",true);
                $("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");

                if($("#emi_banks option:selected").attr("id")=="Customer"){
                    $("#processing_fee").show();
                }else{
                    $("#processing_fee").hide();
                }

            }else{
                $("#emi_plan_id").val("");
                $("#emi_tenure_id").val("");
                $("#emi_tbl").hide();
            }



            $("label.emi_processing_fee_percent").each(function(){
                if($(this).text()==0){
                    $(this).closest("tr").find("label.merchant_subvention").hide();
                }
            });

        });

        $(".emi_plan_radio").live("click",function(){
            var processingFee="";
            $("#emi_tenure_id").val($(this).val());
            processingFee=
                "<span class='emi_fees' >"+
                "Processing Fee:"+$(this).closest('tr').find('label.currency').text()+"&nbsp;"+
                "<label id='processingFee'>"+$(this).closest('tr').find('label.emi_processing_fee_plan').text()+
                "</label><br/>"+
                "Processing fee will be charged only on the first EMI."+
                "</span>";
            $("#processing_fee").children().remove();
            $("#processing_fee").append(processingFee);

            // If processing fee is 0 then hiding emi_fee span
            if($("#processingFee").text()==0){
                $(".emi_fees").hide();
            }

        });


        $("#card_number").focusout(function(){
            /*
             emi_banks(select box) option class attribute contains two fields either allcards or bin no supported by that emi
            */
            if($('input[name="payment_option"]:checked').val() == "OPTEMI"){
                if(!($("#emi_banks option:selected").hasClass("allcards"))){
                    if(!$('#emi_banks option:selected').hasClass($(this).val().substring(0,6))){
                        alert("Selected EMI is not available for entered credit card.");
                    }
                }
            }

        });


        // Emi section end


        // below code for reference

        function processData(data){
            var paymentOptions = [];
            var creditCards = [];
            var debitCards = [];
            var netBanks = [];
            var cashCards = [];
            var mobilePayments=[];
            $.each(data, function() {
                // this.error shows if any error
                console.log(this.error);
                paymentOptions.push(this.payOpt);
                switch(this.payOpt){
                    case 'OPTCRDC':
                        var jsonData = this.OPTCRDC;
                        var obj = $.parseJSON(jsonData);
                        $.each(obj, function() {
                            creditCards.push(this['cardName']);
                        });
                        break;
                    case 'OPTDBCRD':
                        var jsonData = this.OPTDBCRD;
                        var obj = $.parseJSON(jsonData);
                        $.each(obj, function() {
                            debitCards.push(this['cardName']);
                        });
                        break;
                    case 'OPTNBK':
                        var jsonData = this.OPTNBK;
                        var obj = $.parseJSON(jsonData);
                        $.each(obj, function() {
                            netBanks.push(this['cardName']);
                        });
                        break;

                    case 'OPTCASHC':
                        var jsonData = this.OPTCASHC;
                        var obj =  $.parseJSON(jsonData);
                        $.each(obj, function() {
                            cashCards.push(this['cardName']);
                        });
                        break;

                    case 'OPTMOBP':
                        var jsonData = this.OPTMOBP;
                        var obj =  $.parseJSON(jsonData);
                        $.each(obj, function() {
                            mobilePayments.push(this['cardName']);
                        });
                }

            });

            //console.log(creditCards);
            // console.log(debitCards);
            // console.log(netBanks);
            // console.log(cashCards);
            //  console.log(mobilePayments);

        }
    });
</script>



<?php
include ("footer.php");

?>

