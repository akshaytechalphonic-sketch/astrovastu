@extends('layouts.app')

@section('content')
    @php
        $isVastuLP = isset($isVastuLP) && $isVastuLP;
        $pb = $isVastuLP ? null : $pageBanners->get('consult');
    @endphp
    @if($isVastuLP)
        <section class="pg-hero-banner" style="background-image: url('{{ asset('images/banner-vastu.jpg') }}')">
            <div class="ctn">
                <span class="over">Vastu Shastra Consultant</span>
                <h1>Sacred Vastu Consultation</h1>
                <p>Align your home, office, or plot with cosmic energies for prosperity, peace, and good health</p>
            </div>
        </section>
    @elseif($pb)
        <section class="pg-hero-banner" style="background-image: url('{{ asset($pb->image_url) }}')">
            <div class="ctn">
                <span class="over">{{ $pb->title }}</span>
                <h1>{{ $pb->heading ?: 'Book Your Consultation' }}</h1>
                <p>{{ $pb->description ?: 'Fill out the form for a personalized price quote' }}</p>
            </div>
        </section>
    @else
        <section class="pg-hero">
            <div class="ctn">
                <span class="over">Online Consultation</span>
                <h1>Book Your Consultation</h1>
                <p>Fill out the form for a personalized price quote</p>
            </div>
        </section>
    @endif

    <section class="consult-sec">
        <div class="ctn">
            <div class="consult-layout">
                <div class="con-info">
                    @if($isVastuLP)
                        <h3>Vastu Consultation Benefits</h3>
                        <p style="margin-bottom: 20px;">Vastu Shastra is the ancient Indian science of architecture and spatial design. By correcting energy imbalances in your surroundings, you can unlock:</p>
                        <div class="reshape-features" style="margin-bottom: 24px; display: flex; flex-direction: column; gap: 10px;">
                            <div class="reshape-feat" style="padding: 10px 14px; background: var(--white); border: 1px solid var(--w200); border-radius: var(--rad-s); display: flex; align-items: center; gap: 12px;"><div class="rf-icon" style="width: 24px; height: 24px; border-radius: 50%; background: var(--teal-mist); color: var(--teal); display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; font-weight: 700;">✓</div><span style="font-size: 13px; color: var(--w700);">Career growth, business success & financial stability</span></div>
                            <div class="reshape-feat" style="padding: 10px 14px; background: var(--white); border: 1px solid var(--w200); border-radius: var(--rad-s); display: flex; align-items: center; gap: 12px;"><div class="rf-icon" style="width: 24px; height: 24px; border-radius: 50%; background: var(--teal-mist); color: var(--teal); display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; font-weight: 700;">✓</div><span style="font-size: 13px; color: var(--w700);">Improved physical and mental health, reducing stress & anxiety</span></div>
                            <div class="reshape-feat" style="padding: 10px 14px; background: var(--white); border: 1px solid var(--w200); border-radius: var(--rad-s); display: flex; align-items: center; gap: 12px;"><div class="rf-icon" style="width: 24px; height: 24px; border-radius: 50%; background: var(--teal-mist); color: var(--teal); display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; font-weight: 700;">✓</div><span style="font-size: 13px; color: var(--w700);">Family harmony, mutual understanding, and positive relationships</span></div>
                            <div class="reshape-feat" style="padding: 10px 14px; background: var(--white); border: 1px solid var(--w200); border-radius: var(--rad-s); display: flex; align-items: center; gap: 12px;"><div class="rf-icon" style="width: 24px; height: 24px; border-radius: 50%; background: var(--teal-mist); color: var(--teal); display: flex; align-items: center; justify-content: center; font-size: 12px; flex-shrink: 0; font-weight: 700;">✓</div><span style="font-size: 13px; color: var(--w700);">Removal of negative energies & Vastu Dosh without major structural changes</span></div>
                        </div>
                    @else
                        <h3>Why Consult With Us?</h3>
                        <p>Astrology can reshape your life. <span id="infoGuruName">{{ $settings->guru_name }}</span> provides proven solutions backed by <span id="infoGuruExp">{{ $settings->experience_years }}</span>+ years of expertise. Available in Hindi and English, online and in-person.</p>
                    @endif
                    
                    <div class="con-item">
                        <div class="ci-icon">📞</div>
                        <div>
                            <div class="ci-lbl">Phone</div>
                            <div class="ci-val" id="infoPhone">{{ $settings->phone }}</div>
                        </div>
                    </div>
                    <div class="con-item">
                        <div class="ci-icon">📧</div>
                        <div>
                            <div class="ci-lbl">Email</div>
                            <div class="ci-val" id="infoEmail">{{ $settings->email }}</div>
                        </div>
                    </div>
                    <div class="con-item">
                        <div class="ci-icon">📍</div>
                        <div>
                            <div class="ci-lbl">Visit</div>
                            <div class="ci-val" id="infoAddress">{{ $settings->address }}</div>
                        </div>
                    </div>
                    <div class="con-item">
                        <div class="ci-icon">💳</div>
                        <div>
                            <div class="ci-lbl">Payment</div>
                            <div class="ci-val">UPI · Bank Transfer · Cash</div>
                        </div>
                    </div>
                    <!-- Astro Vastu Pooja Sticker -->
<div class="consult-sticker">
  <img src="{{ asset('storage/gallery/5lfHFE393mqnLiq5bd0jXTwRDIBUx45ycZzlW8h9.jpg') }}"
     alt="Astro Vastu Pooja"
     loading="lazy">
</div>

<style>
    .consult-sticker {
        margin-top: 15px;
        text-align: center;
    }

    .consult-sticker img {
        width: 180px;
        height: auto;
        display: inline-block;
        object-fit: contain;
    }
</style>
                </div>
                
                <div class="form-card">
                    <div class="fc-title">{{ $isVastuLP ? 'Book Vastu Consultation' : 'Get Your Price Quote' }}</div>
                    
                    <!-- Alert message container -->
                    <div id="alertBox" style="display:none; margin-bottom:16px; padding:12px 20px; text-align:center; font-size:14px; border-radius:8px"></div>

                    @if(session('success'))
                        <div style="margin-bottom:16px; padding:12px 20px; text-align:center; font-size:14px; border-radius:8px; background: #EDF8F5; border: 1px solid #1B6B5A; color: #1B6B5A;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="consultForm" action="{{ route('consult.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-grp">
                                <label>Full Name <span style="color:red">*</span></label>
                                <input id="fullName" name="FullName" required placeholder="Your name" value="{{ old('FullName') }}">
                            </div>
                            <div class="form-grp">
                                <label>Phone <span style="color:red">*</span></label>
                                <input id="phone" name="Phone" required placeholder="+91 XXXXX XXXXX" value="{{ old('Phone') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-grp">
                                <label>Date of Birth</label>
                                <input name="DateOfBirth" type="date" value="{{ old('DateOfBirth') }}">
                            </div>
                            <div class="form-grp">
                                <label>Time of Birth</label>
                                <input name="TimeOfBirth" type="time" value="{{ old('TimeOfBirth') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-grp">
                                <label>Gender</label>
                                <select name="Gender">
                                    <option value="Male" {{ old('Gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('Gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="form-grp">
                                <label>Language</label>
                                <select name="Language">
                                    <option value="Hindi" {{ old('Language') == 'Hindi' ? 'selected' : '' }}>Hindi</option>
                                    <option value="English" {{ old('Language') == 'English' ? 'selected' : '' }}>English</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-grp">
                            <label>Place of Birth</label>
                            <input name="PlaceOfBirth" placeholder="City, State" value="{{ old('PlaceOfBirth') }}">
                        </div>
                        <div class="form-grp">
                            <label>Your Concern</label>
                            <textarea name="Concern" placeholder="Describe your question or concern...">{{ old('Concern') }}</textarea>
                        </div>
                        <button class="btn btn-p btn-full" type="submit">{{ $isVastuLP ? 'Request Vastu Consultation →' : 'Get Price Quote →' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const form = document.getElementById("consultForm");
            const alertBox = document.getElementById("alertBox");

            form.addEventListener("submit", (e) => {
                e.preventDefault();

                const name = document.getElementById("fullName").value.trim();
                const phone = document.getElementById("phone").value.trim();

                if (!name || !phone) {
                    alertBox.style.background = "#FDF2F2";
                    alertBox.style.border = "1px solid #7A1F1F";
                    alertBox.style.color = "#7A1F1F";
                    alertBox.textContent = "Name and Phone are required.";
                    alertBox.style.display = "block";
                    return;
                }

                // Ajax Submit
                const formData = new FormData(form);
                
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alertBox.style.background = "#EDF8F5";
                        alertBox.style.border = "1px solid #1B6B5A";
                        alertBox.style.color = "#1B6B5A";
                        alertBox.textContent = data.message;
                        alertBox.style.display = "block";
                        form.reset();
                    } else {
                        alertBox.style.background = "#FDF2F2";
                        alertBox.style.border = "1px solid #7A1F1F";
                        alertBox.style.color = "#7A1F1F";
                        alertBox.textContent = "Something went wrong. Please try again.";
                        alertBox.style.display = "block";
                    }
                    window.scrollTo({
                        top: alertBox.getBoundingClientRect().top + window.scrollY - 100,
                        behavior: 'smooth'
                    });
                })
                .catch(err => {
                    console.error("Submit error: ", err);
                    alertBox.style.background = "#FDF2F2";
                    alertBox.style.border = "1px solid #7A1F1F";
                    alertBox.style.color = "#7A1F1F";
                    alertBox.textContent = "Server connection error. Please try again.";
                    alertBox.style.display = "block";
                });
            });
        });
    </script>
@endpush
