@extends('front.layouts.layout')

@section('content')
<div class="page-banner bg-color-05">
    <div class="page-banner__wrapper">
        <div class="container">
            <div class="page-breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">FAQs</li>
                </ul>
            </div>
            <div class="page-banner__caption text-center">
                <h2 class="page-banner__main-title">Frequently Asked Questions</h2>
            </div>
        </div>
    </div>
</div>

<section class="faq-section section-padding-01">
    <div class="container">
        <div class="faq-container">
            @foreach($faqs as $index => $faq)
            <div class="faq-item">
                <button class="faq-question {{ $index === 0 ? 'active' : '' }}" onclick="toggleFaq(this)">
                    {{ $faq['question'] }}
                    <span class="faq-icon"></span>
                </button>
                <div class="faq-answer" style="display: {{ $index === 0 ? 'block' : 'none' }}">
                    {{ $faq['answer'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.faq-container {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: white;
}

.faq-question {
    width: 100%;
    text-align: left;
    padding: 15px 50px 15px 20px;
    font-size: 16px;
    font-weight: 500;
    background: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
}

.faq-question:hover {
    background-color: #f8f9fa;
}

.faq-question.active {
    color: #0d6efd;
}

.faq-icon {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    transition: transform 0.3s ease;
}

.faq-icon::before,
.faq-icon::after {
    content: '';
    position: absolute;
    background-color: #333;
    transition: all 0.3s ease;
}

.faq-icon::before {
    top: 9px;
    left: 0;
    width: 100%;
    height: 2px;
}

.faq-icon::after {
    top: 0;
    left: 9px;
    width: 2px;
    height: 100%;
}

.faq-question.active .faq-icon::after {
    transform: rotate(90deg);
    opacity: 0;
}

.faq-answer {
    padding: 0 20px;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
    background: white;
}

.faq-answer.show {
    padding: 15px 20px;
    max-height: 500px;
}

@media (max-width: 767px) {
    .faq-question {
        padding: 12px 40px 12px 15px;
        font-size: 14px;
    }
    
    .faq-answer {
        padding: 0 15px;
        font-size: 14px;
    }
    
    .faq-answer.show {
        padding: 12px 15px;
    }
    
    .faq-icon {
        right: 15px;
        width: 16px;
        height: 16px;
    }
}
</style>

<script>
function toggleFaq(button) {
    // Get the current state
    const isActive = button.classList.contains('active');
    
    // Close all FAQs
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.classList.remove('active');
    });
    
    document.querySelectorAll('.faq-answer').forEach(answer => {
        answer.style.display = 'none';
        answer.classList.remove('show');
    });
    
    // If the clicked FAQ wasn't active, open it
    if (!isActive) {
        button.classList.add('active');
        const answer = button.nextElementSibling;
        answer.style.display = 'block';
        // Force a reflow before adding the show class
        answer.offsetHeight;
        answer.classList.add('show');
    }
}

// Initialize the first FAQ as open
document.addEventListener('DOMContentLoaded', function() {
    const firstFaq = document.querySelector('.faq-question');
    if (firstFaq) {
        const answer = firstFaq.nextElementSibling;
        answer.classList.add('show');
    }
});
</script>
@endsection