
var a;

function changeMap(n)
{
    switch (n)
    {
        case 2:
            document.getElementById('cluster_img').src='resources/cluster1.jpg';
            document.getElementById('cluster_img').useMap='#second_cluster';
            break;
        case 1:
            document.getElementById('cluster_img').src='resources/cluster.jpg';
            document.getElementById('cluster_img').useMap='#first_cluster';
            break;
        case 3:
            document.getElementById('cluster_img').src='resources/cluster2.jpg';
            document.getElementById('cluster_img').useMap='#third_cluster';
            break;
    }
}

function setBorder(n)
{
    document.getElementById('advance').style='';
    document.getElementById('take').style='';
    document.getElementById('look').style='';
    document.getElementById('use').style='';
    document.getElementById('speak').style='';
    switch(n)
    {
        case 1:
            document.getElementById('advance').style='border: 4px solid #FF070A;';
            break;
        case 2:
            document.getElementById('take').style='border: 4px solid #FF070A;';
            break;
        case 3:
            document.getElementById('look').style='border: 4px solid #FF070A;';
            break;
        case 4:
            document.getElementById('use').style='border: 4px solid #FF070A;';
            break;
        case 5:
            document.getElementById('speak').style='border: 4px solid #FF070A;';
            break;             
    }
}

function headAgainstWall()
{
    a = document.getElementById('cluster_img').src;
    document.getElementById('cluster_img').src='https://wuzzup.ru/wp-content/uploads/2018/02/1-2.gif';
    setTimeout(() => {
        document.getElementById('cluster_img').src=a;
    }, 2000);
}

function keepCalm()
{
    a = document.getElementById('cluster_img').src;
    document.getElementById('cluster_img').src=' https://media0.giphy.com/media/3o6fIXOuG9rl6T8QNy/source.gif';
    setTimeout(() => {
        document.getElementById('cluster_img').src=a;
    }, 2500);
}

function towel()
{
    a = document.getElementById('cluster_img').src;
    if (Math.round(Math.random()) == 1)
    {
        document.getElementById('cluster_img').src='https://cs.pikabu.ru/post_img/2013/09/18/8/1379503934_875098243.gif';
        setTimeout(() => {
            document.getElementById('cluster_img').src=a;
        }, 4000);
    }
    else
    {
        document.getElementById('cluster_img').src='https://memepedia.ru/wp-content/uploads/2017/08/mem-s-negrom-kotoryy-poteet.gif';
        setTimeout(() => {
            document.getElementById('cluster_img').src=a;
        }, 1000);
    }
}