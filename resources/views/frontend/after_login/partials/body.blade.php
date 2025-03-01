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
    
    <div class="row justify-content-center mb-4">
        <div class="col-md-10">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="support-team">
                        <h2>Non Stop Earning - Learning Support Team</h2>
                        <div class="team-member">
                            <span>My Team Leader</span>
                            <button class="btn whatsapp">WhatsApp</button>
                        </div>
                        <div class="team-member">
                            <span>My Trainer</span>
                            <button class="btn whatsapp">WhatsApp</button>
                        </div>
                        <div class="team-member">
                            <span>Support WhatsApp Group</span>
                            <button class="btn join">Join</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mb-4">
        <div class="alert alert-warning">
            Non Stop Earning - Learning Join Live Learning Training Class Bangladesh Time(8:00 AM To 11:00 PM)
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="row">
            @foreach($liveclasses as $liveclass)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center shadow-sm p-4" style="border-radius: 10px; background-color: #f4f7fc;">
                    <div class="card-body d-flex flex-column align-items-center">
                        <!-- Meeting Icon -->
                        <div class="meeting-icon" style="font-size: 50px; color: #00C9FF;">
                            &#128187;
                        </div>
    
                        <!-- Title -->
                        <h5 class="card-title mt-3">{{ $liveclass->title }}</h5>
    
                        <!-- Join Button -->
                        <a href="{{ $liveclass->url }}" class="btn btn-primary mt-3" style="background: linear-gradient(90deg, #00C9FF 0%, #feb892 100%); border: none; border-radius: 50px; padding: 10px 20px;">Join Class</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>

<style>
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
