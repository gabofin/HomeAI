<div id="widgetClock">
    <div class="time">
        {$smarty.now|date_format:"%H:%M"}
    </div>
    <div class="date">
        {$smarty.now|date_format:"%d.%m:%Y"}
    </div>
    <div class="day">
	&nbsp;
    </div>
</div>

<script type="text/javascript">
   Date.prototype.getWeek = function () {
       var onejan = new Date(this.getFullYear(), 0, 1);
       return Math.ceil((((this - onejan) / 86400000) + onejan.getDay() + 1) / 7);
   };
    var dayNames = new Array("Sunnuntai","Maanantai","Tiistai","Keskiviikko","Torstai","Perjantai","Lauantai");
    setInterval(function() {
        var date = new Date();

        var hours = date.getHours() < 10 ? "0"+ date.getHours() : date.getHours();
        var minutes = date.getMinutes() < 10 ? "0"+ date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0"+ date.getSeconds() : date.getSeconds();
        var day = date.getDate() < 10 ? "0"+ date.getDate() : date.getDate();
        var month = (date.getMonth() + 1) < 10 ? "0"+ (date.getMonth() + 1) : (date.getMonth() + 1);
        var year = date.getFullYear();
        var weeknumber = date.getWeek();

        var container = jQuery('#widgetClock');

        jQuery('div.time', container).text(hours +':'+ minutes);
        jQuery('div.date', container).text(day +'.'+ month +'.'+ year);
        jQuery('div.day', container).text(dayNames[date.getDay()] + ". Viikko "+weeknumber +".");

    }, 1000);
</script>