

$.ajax({
    url:"http://api.openweathermap.org/data/2.5/weather?q=Lyon&units=metric&APPID=a0e78d3b449db7059df0a38abd3952f8"}).done(function(data) {
    jsonFile = data;
    let iconcode = jsonFile.weather[0].icon;
    let lieu = jsonFile.name;
    let temperature = jsonFile.main.temp;
    $('.temperature-meteo').text(temperature);
    $('.lieu-meteo').text(lieu);
    $('.icon-meteo').attr('src', "http://openweathermap.org/img/w/" + iconcode + ".png");
});