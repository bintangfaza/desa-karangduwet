import Chart from "chart.js/auto";

const canvas = document.getElementById("dashboardChart");

if(canvas){

    const ctx = canvas.getContext("2d");

    const green = ctx.createLinearGradient(0,0,0,400);
    green.addColorStop(0,"#36d96f");
    green.addColorStop(1,"#16a34a");

    const blue = ctx.createLinearGradient(0,0,0,400);
    blue.addColorStop(0,"#60a5fa");
    blue.addColorStop(1,"#2563eb");

    const cyan = ctx.createLinearGradient(0,0,0,400);
    cyan.addColorStop(0,"#67e8f9");
    cyan.addColorStop(1,"#06b6d4");

    const orange = ctx.createLinearGradient(0,0,0,400);
    orange.addColorStop(0,"#fbbf24");
    orange.addColorStop(1,"#f97316");

    const gray = ctx.createLinearGradient(0,0,0,400);
    gray.addColorStop(0,"#94a3b8");
    gray.addColorStop(1,"#64748b");

    const red = ctx.createLinearGradient(0,0,0,400);
    red.addColorStop(0,"#fb7185");
    red.addColorStop(1,"#ef4444");

    const data = JSON.parse(canvas.dataset.chart);
    const labels = JSON.parse(canvas.dataset.labels);

    new Chart(canvas,{
        type:"doughnut",

        data:{
            labels,
            datasets:[{
                data,
                backgroundColor:[
                    green,
                    blue,
                    cyan,
                    orange,
                    gray,
                    red
                ],
                borderWidth:0,
                hoverOffset:18
            }]
        },

        options:{
            responsive:true,
            maintainAspectRatio:false,
            cutout:"72%",
            animation:{
                animateRotate:true,
                duration:1800
            },
            plugins:{
                legend:{
                    display:false
                },
                tooltip:{
                    backgroundColor:"#1e293b",
                    padding:14,
                    cornerRadius:12,
                    titleColor:"#fff",
                    bodyColor:"#fff"
                }
            }
        }

    });

}