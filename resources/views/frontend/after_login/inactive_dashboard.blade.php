@include('frontend.after_login.partials.header')

<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-2">
            @include('frontend.after_login.partials.leftsideber')
        </div>

        <!-- Main Content: Hero and Body -->
        <div class="col-md-10">
            <div class="hero-section">
                <div class="hero-content">
                    <div class="text-container">
                        <br><br>
                        <h1>WELCOME TO Non Stop Earning - Learning Platform</h1>
                        <h2>Please Active your acount</h2>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row justify-content-center mb-4">
                    <div class="col-md-6">
                        <div class="card text-center shadow">
                            <div class="card-body">
                                <h5 class="card-title">May I Help You</h5>
                                <a href="#" class="btn btn-success">Get Links</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-center shadow">
                            <div class="card-body">
                                <h5 class="card-title">Non Stop Earning - Learning Support Meeting</h5>
                                <a href="#" class="btn btn-primary">Get Meeting Links</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@include('frontend.after_login.partials.footer')

<style>
    /* Base Styles */
    .hero-section {
        background-size: cover;
        height: auto; /* Adjust height to fit content */
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding: 20px; /* Add padding to avoid content touching edges */
        text-align: center; /* Center text horizontally */
    }

    .hero-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        max-width: 1200px;
        width: 100%;
    }

    .text-container {
        color: white;
    }

    .text-container h1 {
        font-size: 40px;
        margin: 30px 0;
        font-weight: bold;
    }

    .text-container p {
        font-size: 18px;
        color: #484343;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .text-container h1 {
            font-size: 30px;
        }

        .text-container p {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .text-container h1 {
            font-size: 24px;
        }

        .text-container p {
            font-size: 14px;
        }
    }

    .card {
        border-radius: 10px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .btn {
        font-size: 1rem;
        padding: 10px 20px;
    }

    .alert-warning {
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 10px;
    }
    .support-team {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: center;
}

.support-team h2 {
    margin-bottom: 20px;
    font-size: 20px;
    color: #333;
}

.team-member {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.team-member span {
    flex: 1;
    text-align: left;
    color: #333;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn.whatsapp {
    background-color: #25D366;
    color: white;
}

.btn.join {
    background-color: #4CAF50;
    color: white;
}

.btn:hover {
    opacity: 0.9;
}
</style>

