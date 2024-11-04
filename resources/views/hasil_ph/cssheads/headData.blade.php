<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masuk</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      body {
            height: 100vh;
            margin: 0;
            position: relative;
            overflow: hidden;
            background-image: url('https://images.pexels.com/photos/11774159/pexels-photo-11774159.jpeg');
            background-size: cover;
            background-position: center;
        }

        .glitch-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Ensures this element does not block interactions */
            z-index: -1; /* Places it behind other content */
            overflow: hidden; /* Ensure no overflow affects layout */
        }

        .glitch-background::before,
        .glitch-background::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black; /* Color for the glitch effect */
            z-index: -1;
        }

        .glitch-background::before {
            background-color: rgba(0, 0, 0, 0.8); /* Darker overlay for the glitch effect */
            animation: glitch-animation 4s infinite;
        }

        .glitch-background::after {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            animation: glitch-animation 6s infinite;
        }

        @keyframes glitch-animation {
            0% {
                clip: rect(10px, 9999px, 40px, 0);
                transform: skew(0.2deg);
            }
            10% {
                clip: rect(30px, 9999px, 70px, 0);
                transform: skew(0.1deg);
            }
            20% {
                clip: rect(50px, 9999px, 90px, 0);
                transform: skew(0.15deg);
            }
            30% {
                clip: rect(20px, 9999px, 50px, 0);
                transform: skew(0.2deg);
            }
            40% {
                clip: rect(40px, 9999px, 80px, 0);
                transform: skew(0.25deg);
            }
            50% {
                clip: rect(10px, 9999px, 40px, 0);
                transform: skew(0.2deg);
            }
            60% {
                clip: rect(30px, 9999px, 70px, 0);
                transform: skew(0.15deg);
            }
            70% {
                clip: rect(50px, 9999px, 90px, 0);
                transform: skew(0.2deg);
            }
            80% {
                clip: rect(20px, 9999px, 50px, 0);
                transform: skew(0.25deg);
            }
            90% {
                clip: rect(40px, 9999px, 80px, 0);
                transform: skew(0.3deg);
            }
            100% {
                clip: rect(10px, 9999px, 40px, 0);
                transform: skew(0.2deg);
            }
        }

        .container {
  width: 80%;
  margin: 0 auto;
  padding: 20px;
}

#data-masuk-table {
  width: 100%;
  border-collapse: collapse; 
  margin: 20px 0; 
}

#data-masuk-table th, 
#data-masuk-table td {
  padding: 15px;
  text-align: center; /* Centers text in table cells */
  border: 1px solid transparent; /* Light border color */
  color: transparent; /* Change text color to white */
}


#data-masuk-table th {
  background-color: transparent; 
}

h1,
h2 {
  margin: 0;
}

a {
  color: #ccc;
}

section {
  padding: 20px;
}

.hero {
  font-size: clamp(40px, 10vw, 100px);
  line-height: 1;
  display: inline-block;
  color: #fff;
  z-index: 2;
  letter-spacing: 10px;

  /* Bright things in dark environments usually cast that light, giving off a glow */
  filter: drop-shadow(0 1px 3px);
}

.demo {
  height: 100px;
  background: #fff;
}

.layers {
  position: relative;
}

.layers::before,
.layers::after {
  content: attr(data-text);
  position: absolute;
  width: 110%;
  z-index: -1;
}

.layers::before {
  top: 10px;
  left: 15px;
  color: #e0287d;
}

.layers::after {
  top: 5px;
  left: -10px;
  color: #1bc7fb;
}

.single-path {
  clip-path: polygon(
    0% 12%,
    53% 12%,
    53% 26%,
    25% 26%,
    25% 86%,
    31% 86%,
    31% 0%,
    53% 0%,
    53% 84%,
    92% 84%,
    92% 82%,
    70% 82%,
    70% 29%,
    78% 29%,
    78% 65%,
    69% 65%,
    69% 66%,
    77% 66%,
    77% 45%,
    85% 45%,
    85% 26%,
    97% 26%,
    97% 28%,
    84% 28%,
    84% 34%,
    54% 34%,
    54% 89%,
    30% 89%,
    30% 58%,
    83% 58%,
    83% 5%,
    68% 5%,
    68% 36%,
    62% 36%,
    62% 1%,
    12% 1%,
    12% 34%,
    60% 34%,
    60% 57%,
    98% 57%,
    98% 83%,
    1% 83%,
    1% 53%,
    91% 53%,
    91% 84%,
    8% 84%,
    8% 83%,
    4% 83%
  );
}

.paths {
  animation: paths 5s step-end infinite;
}

@keyframes paths {
  0% {
    clip-path: polygon(
      0% 43%,
      83% 43%,
      83% 22%,
      23% 22%,
      23% 24%,
      91% 24%,
      91% 26%,
      18% 26%,
      18% 83%,
      29% 83%,
      29% 17%,
      41% 17%,
      41% 39%,
      18% 39%,
      18% 82%,
      54% 82%,
      54% 88%,
      19% 88%,
      19% 4%,
      39% 4%,
      39% 14%,
      76% 14%,
      76% 52%,
      23% 52%,
      23% 35%,
      19% 35%,
      19% 8%,
      36% 8%,
      36% 31%,
      73% 31%,
      73% 16%,
      1% 16%,
      1% 56%,
      50% 56%,
      50% 8%
    );
  }

  5% {
    clip-path: polygon(
      0% 29%,
      44% 29%,
      44% 83%,
      94% 83%,
      94% 56%,
      11% 56%,
      11% 64%,
      94% 64%,
      94% 70%,
      88% 70%,
      88% 32%,
      18% 32%,
      18% 96%,
      10% 96%,
      10% 62%,
      9% 62%,
      9% 84%,
      68% 84%,
      68% 50%,
      52% 50%,
      52% 55%,
      35% 55%,
      35% 87%,
      25% 87%,
      25% 39%,
      15% 39%,
      15% 88%,
      52% 88%
    );
  }

  30% {
    clip-path: polygon(
      0% 53%,
      93% 53%,
      93% 62%,
      68% 62%,
      68% 37%,
      97% 37%,
      97% 89%,
      13% 89%,
      13% 45%,
      51% 45%,
      51% 88%,
      17% 88%,
      17% 54%,
      81% 54%,
      81% 75%,
      79% 75%,
      79% 76%,
      38% 76%,
      38% 28%,
      61% 28%,
      61% 12%,
      55% 12%,
      55% 62%,
      68% 62%,
      68% 51%,
      0% 51%,
      0% 92%,
      63% 92%,
      63% 4%,
      65% 4%
    );
  }

  45% {
    clip-path: polygon(
      0% 33%,
      2% 33%,
      2% 69%,
      58% 69%,
      58% 94%,
      55% 94%,
      55% 25%,
      33% 25%,
      33% 85%,
      16% 85%,
      16% 19%,
      5% 19%,
      5% 20%,
      79% 20%,
      79% 96%,
      93% 96%,
      93% 50%,
      5% 50%,
      5% 74%,
      55% 74%,
      55% 57%,
      96% 57%,
      96% 59%,
      87% 59%,
      87% 65%,
      82% 65%,
      82% 39%,
      63% 39%,
      63% 92%,
      4% 92%,
      4% 36%,
      24% 36%,
      24% 70%,
      1% 70%,
      1% 43%,
      15% 43%,
      15% 28%,
      23% 28%,
      23% 71%,
      90% 71%,
      90% 86%,
      97% 86%,
      97% 1%,
      60% 1%,
      60% 67%,
      71% 67%,
      71% 91%,
      17% 91%,
      17% 14%,
      39% 14%,
      39% 30%,
      58% 30%,
      58% 11%,
      52% 11%,
      52% 83%,
      68% 83%
    );
  }

  76% {
    clip-path: polygon(
      0% 26%,
      15% 26%,
      15% 73%,
      72% 73%,
      72% 70%,
      77% 70%,
      77% 75%,
      8% 75%,
      8% 42%,
      4% 42%,
      4% 61%,
      17% 61%,
      17% 12%,
      26% 12%,
      26% 63%,
      73% 63%,
      73% 43%,
      90% 43%,
      90% 67%,
      50% 67%,
      50% 41%,
      42% 41%,
      42% 46%,
      50% 46%,
      50% 84%,
      96% 84%,
      96% 78%,
      49% 78%,
      49% 25%,
      63% 25%,
      63% 14%
    );
  }

  90% {
    clip-path: polygon(
      0% 41%,
      13% 41%,
      13% 6%,
      87% 6%,
      87% 93%,
      10% 93%,
      10% 13%,
      89% 13%,
      89% 6%,
      3% 6%,
      3% 8%,
      16% 8%,
      16% 79%,
      0% 79%,
      0% 99%,
      92% 99%,
      92% 90%,
      5% 90%,
      5% 60%,
      0% 60%,
      0% 48%,
      89% 48%,
      89% 13%,
      80% 13%,
      80% 43%,
      95% 43%,
      95% 19%,
      80% 19%,
      80% 85%,
      38% 85%,
      38% 62%
    );
  }

  1%,
  7%,
  33%,
  47%,
  78%,
  93% {
    clip-path: none;
  }
}

.movement {
  /* Normally this position would be absolute & on the layers, set to relative here so we can see it on the div */
  position: relative;
  animation: movement 8s step-end infinite;
}

@keyframes movement {
  0% {
    top: 0px;
    left: -20px;
  }

  15% {
    top: 10px;
    left: 10px;
  }

  60% {
    top: 5px;
    left: -10px;
  }

  75% {
    top: -5px;
    left: 20px;
  }

  100% {
    top: 10px;
    left: 5px;
  }
}

.opacity {
  animation: opacity 5s step-end infinite;
}

@keyframes opacity {
  0% {
    opacity: 0.1;
  }

  5% {
    opacity: 0.7;
  }

  30% {
    opacity: 0.4;
  }

  45% {
    opacity: 0.6;
  }

  76% {
    opacity: 0.4;
  }

  90% {
    opacity: 0.8;
  }

  1%,
  7%,
  33%,
  47%,
  78%,
  93% {
    opacity: 0;
  }
}

.font {
  animation: font 7s step-end infinite;
}

@keyframes font {
  0% {
    font-weight: 100;
    color: #e0287d;
    filter: blur(3px);
  }

  20% {
    font-weight: 500;
    color: #fff;
    filter: blur(0);
  }

  50% {
    font-weight: 300;
    color: #1bc7fb;
    filter: blur(2px);
  }

  60% {
    font-weight: 700;
    color: #fff;
    filter: blur(0);
  }

  90% {
    font-weight: 500;
    color: #e0287d;
    filter: blur(6px);
  }
}

.glitch span {
  animation: paths 5s step-end infinite;
}

.glitch::before {
  animation: paths 5s step-end infinite, opacity 5s step-end infinite,
    font 8s step-end infinite, movement 10s step-end infinite;
}

.glitch::after {
  animation: paths 5s step-end infinite, opacity 5s step-end infinite,
    font 7s step-end infinite, movement 8s step-end infinite;
}

.hero-container {
  position: relative;
  padding: 200px 0;
  text-align: center;
}

.environment {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 0.5;
  filter: blur(5px);
  background: url(https://images.unsplash.com/photo-1602136773736-34d445b989cb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1200&q=80)
    center no-repeat;
  background-size: cover;
}
.a {
        }

    a:before, 
    a:after {
      content: 'sure?';
      position: absolute;
        top: 0;
        left: 0;
      padding: 8px 0;
      width: 100%;
      -webkit-clip: rect(0px, 0px, 0px, 0px);
      clip: rect(0px, 0px, 0px, 0px);
      background: #fff;
      color: #000;
    }
    
    a:before {
      left: -3px;
      top: -2px;
      text-shadow: 2px 0 #fff;
      box-shadow: 2px 0 #fff;
    }
  
    a:after {
      left: 2px;
      bottom: -2px;
      text-shadow: -1px 0 #fff;
      box-shadow: -1px 0 #fff;
    }
  
    a:hover {
      background: white;
      color: black;
    }
  
    a:hover:before {
        animation: glitch-test 1.5s infinite linear alternate-reverse;
    }
    
    a:hover:after {
        animation: glitch-test 2s infinite linear alternate;
    }

@keyframes glitch-test {
  0% {
    clip: rect(-3px, 600px, 0px, 0px);
  }
  5.88235% {
    clip: rect(0px, 600px, 0px, 0px);
  }
  11.76471% {
    clip: rect(-3px, 600px, 0px, 0px);
  }
  17.64706% {
    clip: rect(-3px, 600px, 0px, 0px);
  }
  23.52941% {
    clip: rect(100px, 600px, 100px, 0px);
  }
  29.41176% {
    clip: rect(0px, 600px, 600px, 0px);
  }
  35.29412% {
    clip: rect(100px, 600px, 0px, 0px);
  }
  41.17647% {
    clip: rect(0px, 600px, 600px, 0px);
  }
  47.05882% {
    clip: rect(100px, 600px, 0px, 0px);
  }
  52.94118% {
    clip: rect(-3px, 600px, 0px, 0px);
  }
  58.82353% {
    clip: rect(100px, 450px,100px, 0px);
  }
  64.70588% {
    clip: rect(0px, 450px, 0px, 0px);
  }
  70.58824% {
    clip: rect(100px, 450px, 100px, 0px);
  }
  76.47059% {
    clip: rect(0px, 450px, 0px, 0px);
  }
  82.35294% {
    clip: rect(0px, 450px, 0px, 0px);
  }
  88.23529% {
    clip: rect(0px, 450px, 0px, 0px);
  }
  94.11765% {
    clip: rect(0px, 450px, 0px, 0px);
  }
  100% {
    clip: rect(0px, 450px, 0px, 0px);
  }
}

    </style>
</head>