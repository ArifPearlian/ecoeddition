@extends('website.layouts.app')
@section('content')


<style>
    
    
    .editor-panel { padding: 40px; }
    .preview-panel {
      background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
      padding: 40px;
      border-left: 1px solid #e2e8f0;
    }
    .section-title {
      font-size: 1.5rem;
      color: #dc2626;
      font-weight: 900;
      margin-bottom: 28px;
      padding-bottom: 12px;
      border-bottom: 4px solid #dc2626;
      display: inline-block;
    }
    .form-group { margin-bottom: 32px; position: relative; }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #1e293b;
    }
    input[type="text"], select, textarea {
      width: 100%;
      padding: 14px 16px;
      border: 2px solid #cbd5e1;
      border-radius: 10px;
      font-size: 1rem;
      transition: all 0.25s;
    }
    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: #dc2626;
      box-shadow: 0 0 0 4px rgba(220,38,38,0.1);
    }
    textarea { min-height: 140px; resize: vertical; }
    .word-info, .char-info {
      display: flex;
      justify-content: space-between;
      margin-top: 8px;
      padding: 8px 12px;
      background: #f1f5f9;
      border-radius: 8px;
      font-size: 0.9rem;
      color: #475569;
    }
    .word-info strong, .char-info strong { color: #dc2626; }
    .radio-group {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }
    .radio-option {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 20px;
      background: #f8fafc;
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .radio-option:hover { border-color: #dc2626; background: #fff5f5; }
    input[type="radio"] { accent-color: #dc2626; width: 18px; height: 18px; }

    /* Image Upload - Improved */
    .image-upload-box {
      border: 3px dashed #dc2626;
      border-radius: 12px;
      padding: 40px 20px;
      text-align: center;
      background: #fff5f5;
      cursor: pointer;
      transition: all 0.25s;
      position: relative;
    }
    .image-upload-box:hover { background: #ffebeb; border-color: #b91c1c; }
    .image-upload-box input[type="file"] { display: none; }
    .image-preview-container {
      margin-top: 16px;
      position: relative;
      display: inline-block;
    }
    .image-preview-box {
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      overflow: hidden;
      max-width: 100%;
    }
    .image-preview-box img { width: 100%; height: auto; display: block; }
    .remove-image-btn {
      position: absolute;
      top: -10px;
      right: -10px;
      background: #dc2626;
      color: white;
      border: none;
      border-radius: 50%;
      width: 32px;
      height: 32px;
      font-size: 1.2rem;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
      transition: transform 0.2s;
    }
    .remove-image-btn:hover { transform: scale(1.1); }

    .price-breakdown {
      background: #f0f9ff;
      border: 2px solid #0ea5e9;
      border-radius: 12px;
      padding: 20px;
      margin: 32px 0;
    }
    .breakdown-item {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid #e2e8f0;
    }
    .breakdown-item:last-child {
      border-bottom: none;
      font-size: 1.2rem;
      font-weight: 700;
      color: #dc2626;
      margin-top: 12px;
      padding-top: 12px;
      border-top: 2px solid #0ea5e9;
    }
    .continue-btn {
      width: 100%;
      padding: 18px;
      background: linear-gradient(135deg, #dc2626, #991b1b);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 1.15rem;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.25s;
    }
    .continue-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 24px rgba(220,38,38,0.3);
    }

    /* Preview */
    #previewAd {
      background: white;
      border: 4px solid #dc2626;
      border-radius: 14px;
      padding: 40px;
      min-height: 680px;
      box-shadow: 0 12px 32px rgba(0,0,0,0.15);
      font-size: 1.05rem;
      line-height: 1.6;
    }
    .preview-header {
      color: #dc2626;
      font-size: 1.5rem;
      font-weight: 900;
      margin-bottom: 28px;
      padding-bottom: 12px;
      border-bottom: 3px solid #e2e8f0;
    }
    .preview-label {
      font-size: 0.9rem;
      color: #64748b;
      font-weight: 700;
      text-transform: uppercase;
      margin: 24px 0 8px;
    }
    .preview-item {
      background: #f8fafc;
      padding: 16px;
      border-radius: 10px;
      border-left: 5px solid #dc2626;
      margin-bottom: 16px;
    }
    .preview-image {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 24px;
      border: 2px solid #dc2626;
      max-height: 340px;
      object-fit: cover;
    }
    #prevTitle {
      font-weight: 900;
      font-size: 1.6rem;
      text-transform: uppercase;
      color: #000;
      line-height: 1.3;
      margin-bottom: 12px;
    }

    @media (max-width: 1100px) {
      .container { grid-template-columns: 1fr; }
      .preview-panel { border-left: none; border-top: 1px solid #e2e8f0; }
    }
  </style>



<div class="container" style="margin-top: 100px;">
  <div class="row">

    <div class="col-md-6">
      <div class="editor-panel">
        <div class="section-title">Create Your Classified Ad</div>

        {{-- Success / Error Messages --}}
        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:15px;">
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger" style="margin-bottom:15px;">
            <ul style="margin:0; padding-left:20px;">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form id="classifiedForm" action="{{ route('classified.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
          <div class="form-group">
            <label>Category *</label>
            <select id="category" name="category" onchange="updateWordLimit(); updateTitleHint(); updatePreview(); calculatePrice();">
              <option value="">— Please select —</option>
              <option value="matrimonials">Matrimonials (Bride/Groom/Marriage Bureau)</option>
              <option value="vacancy">Job Vacancy</option>
              <option value="vehicle-sale">Vehicle for Sale</option>
              <option value="property-sale">Property for Sale</option>
              <option value="wanted-property">Wanted Property</option>
              <option value="paying-guest">Paying Guest / Rooms</option>
              <option value="livestock">Livestock & Animals</option>
              <option value="miscellaneous">Miscellaneous</option>
            </select>
          </div>

          <div class="form-group">
            <label>Ad Type</label>
            <div class="radio-group">
              <div class="radio-option">
                <input type="radio" id="colorAd" name="adType" value="color" checked onchange="updateForm()">
                <label for="colorAd"> Color Ad</label>
              </div>
              <div class="radio-option">
                <input type="radio" id="bwAd" name="adType" value="bw" onchange="updateForm()">
                <label for="bwAd"> Black & White</label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Ad Size *</label>
            <select id="adSize" name="ad_size" onchange="calculatePrice(); updatePreview();">
              <option value="">— Select size —</option>
            </select>
          </div>

          <div class="form-group">
            <label>Upload Image (optional)</label>
            <div class="image-upload-box" id="uploadArea" onclick="document.getElementById('imgUpload').click()">
              <i class="fas fa-cloud-upload-alt fa-3x" style="color:#dc2626; margin-bottom:16px;"></i>
              <div style="font-weight:600; margin-bottom:8px;">Click or drag image here</div>
              <small>JPG / PNG • Max 5 MB • Preferred size: 300×300 px or larger</small>
              <input type="file" id="imgUpload" name="image" accept="image/*" onchange="handleImage(event)" style="display:none;">
            </div>
            <div id="imgPreview"></div>
          </div>

          <div class="form-group">
            <label id="titleLabel">Headline / Title *</label>
            <input type="text" id="title" name="title" placeholder="e.g. WANTED BRIDE" maxlength="100" oninput="updateCharCount(); updatePreview()">
            <div class="char-info">
              <span>Characters: <strong id="charCount">0</strong>/100</span>
            </div>
            <small id="titleHint" style="color:#dc2626; display:none; margin-top:6px;">
              Use clear heading like: WANTED BRIDE, WANTED GROOM, URGENT SALE, etc.
            </small>
          </div>

          <div class="form-group">
            <label id="adTextLabel">Ad Content * <small>(max 30 words for matrimonial)</small></label>
            <textarea id="text" name="ad_content" placeholder="Write your ad here... (age, education, job, location, contact details etc.)" oninput="countWords(); updatePreview(); calculatePrice();"></textarea>
            <div class="word-info">
              <span>Words: <strong id="wordCount">0</strong></span>
              <span>Left: <strong id="wordsLeft">30</strong></span>
            </div>
          </div>

          <div class="form-group">
            <label>Contact Details *</label>
            <input type="text" id="contact" name="contact_details" placeholder="e.g. Call/WhatsApp: 98xxxxxx12 | 99195xxxxx" oninput="updatePreview()">
          </div>

          {{-- Hidden Fields --}}
          <input type="hidden" name="ad_type" id="ad_type_hidden">
          <input type="hidden" name="word_count" id="word_count_hidden">
          <input type="hidden" name="base_price" id="base_price_hidden">
          <input type="hidden" name="extra_word_price" id="extra_word_price_hidden">
          <input type="hidden" name="gst_charges" id="gst_charges_hidden">
          <input type="hidden" name="total_price" id="total_price_hidden">

          <div class="price-breakdown">
            <div class="breakdown-item"><span>Base Price</span><strong id="base">₹0</strong></div>
            <div class="breakdown-item"><span>Extra Words (₹45 each)</span><strong id="extra">₹0</strong></div>
            <div class="breakdown-item"><span>GST & Other Charges</span><strong id="gst">₹0</strong></div>
            <div class="breakdown-item"><span style="font-size:1.25rem">TOTAL PAYABLE</span><strong id="total" style="font-size:1.4rem">₹0</strong></div>
          </div>

          <button type="button" class="continue-btn" onclick="proceed()">SUBMIT AD</button>
        </form>
      </div>
    </div>

    <div class="col-md-6">
      <div class="preview-panel">
        <div class="preview-header"><i class="fas fa-eye"></i> Live Newspaper Preview</div>
        <div id="previewAd">
          <div id="previewImage"></div>

          <div class="preview-label">Category</div>
          <div class="preview-item"><strong id="prevCategory">— not selected —</strong></div>

          <div class="preview-label">Ad Size & Type</div>
          <div class="preview-item"><strong id="prevTypeSize">— not selected —</strong></div>

          <div class="preview-label">Advertisement</div>
          <div class="preview-item">
            <div id="prevTitle">Your headline here</div>
            <div id="prevText">Your ad content will appear here…</div>
            <div id="prevContact">Contact details here</div>
          </div>

          <div class="preview-label">Word Count</div>
          <div class="preview-item"><strong id="prevWords">0 / 30 words</strong></div>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
// RATE CARD
const RATE_CARD = {
  color: {
    "fullpage-color": { label: "Full Page (FRONT)", dim: "29.0 × 25 cm", price: 3000 },
    "fullpage-inside-color": { label: "Full Page (Front Inside)", dim: "32.3 × 25 cm", price: 2800 },
    "backpage-color": { label: "Back Page", dim: "32.3 × 25 cm", price: 2400 },
    "backpage-inside-color": { label: "Back Page (Inside)", dim: "32.3 × 25 cm", price: 2000 },
    "halfpage-sitting-color": { label: "Half Page (Sitting)", dim: "16.13 × 25 cm", price: 1000 },
    "halfpage-standing-color": { label: "Half Page (Standing)", dim: "32.3 × 12.5 cm", price: 1000 },
    "quarterpage-color": { label: "Quarter Page", dim: "16.13 × 12.5 cm", price: 5000 },
    "1_8th-color": { label: "1/8th Page", dim: "8.1 × 12.5 cm", price: 2500 },
    "1_16th-pic-color": { label: "1/16th Page + Picture", dim: "8.17 × 6.25 cm", price: 1600 },
    "1_16th-text-color": { label: "1/16th Page (Text only)", dim: "8.17 × 6.25 cm", price: 1400 }
  },
  bw: {
    "fullpage-bw": { label: "Full Page (FRONT)", dim: "29 × 25 cm", price: 2600 },
    "fullpage-inside-bw": { label: "Full Page (Front Inside)", dim: "32.3 × 25 cm", price: 2200 },
    "backpage-bw": { label: "Back Page", dim: "32.3 × 25 cm", price: 1800 },
    "backpage-inside-bw": { label: "Back Page (Inside)", dim: "32.3 × 25 cm", price: 1400 },
    "halfpage-sitting-bw": { label: "Half Page (Sitting)", dim: "16.1 × 25 cm", price: 700 },
    "halfpage-standing-bw": { label: "Half Page (Standing)", dim: "32.3 × 12.5 cm", price: 700 },
    "quarterpage-bw": { label: "Quarter Page", dim: "16.1 × 12.5 cm", price: 3500 },
    "1_8th-bw": { label: "1/8th Page", dim: "8.1 × 12.5 cm", price: 2000 },
    "1_16th-pic-bw": { label: "1/16th Page + Picture", dim: "6.25 × 8.17 cm", price: 1500 }
  }
};

const WORD_LIMITS = {
  "matrimonials": 30,
  "vacancy": 45,
  "vehicle-sale": 30,
  "property-sale": 40,
  "wanted-property": 35,
  "paying-guest": 30,
  "livestock": 25,
  "miscellaneous": 40,
  "": 50
};

const EXTRA_PER_WORD = 45;
const GST_RATE = 0.05;

const el = {
  category: document.getElementById("category"),
  adSize: document.getElementById("adSize"),
  title: document.getElementById("title"),
  text: document.getElementById("text"),
  contact: document.getElementById("contact"),
  wordCount: document.getElementById("wordCount"),
  wordsLeft: document.getElementById("wordsLeft"),
  charCount: document.getElementById("charCount"),
  base: document.getElementById("base"),
  extra: document.getElementById("extra"),
  gst: document.getElementById("gst"),
  total: document.getElementById("total"),
  prevCategory: document.getElementById("prevCategory"),
  prevTypeSize: document.getElementById("prevTypeSize"),
  prevTitle: document.getElementById("prevTitle"),
  prevText: document.getElementById("prevText"),
  prevContact: document.getElementById("prevContact"),
  prevWords: document.getElementById("prevWords"),
  prevImage: document.getElementById("previewImage"),
  imgPrev: document.getElementById("imgPreview"),
  adTextLabel: document.getElementById("adTextLabel"),
  titleLabel: document.getElementById("titleLabel"),
  titleHint: document.getElementById("titleHint")
};

function getCurrentMaxWords() {
  return WORD_LIMITS[el.category.value] ?? 50;
}

function updateWordLimit() {
  const max = getCurrentMaxWords();
  el.adTextLabel.innerHTML = `Ad Content * <small>(max ${max} words${el.category.value === "matrimonials" ? " – ideal for matrimonial" : ""})</small>`;
  countWords();
  calculatePrice();
  updatePreview();
}

function updateTitleHint() {
  if (el.category.value === "matrimonials") {
    el.titleHint.style.display = "block";
    el.title.placeholder = "e.g. WANTED BRIDE";
  } else {
    el.titleHint.style.display = "none";
    el.title.placeholder = "e.g. URGENT REQUIRED ACCOUNTANTS";
  }
}

function updateCharCount() {
  const len = el.title.value.length;
  el.charCount.textContent = len;
  if (len > 90) el.charCount.style.color = len > 95 ? "#dc2626" : "#f59e0b";
  else el.charCount.style.color = "#475569";
}

function populateSizes() {
  const type = document.querySelector('input[name="adType"]:checked')?.value || "color";
  el.adSize.innerHTML = '<option value="">— Select size —</option>';

  Object.entries(RATE_CARD[type] || {}).forEach(([key, data]) => {
    const opt = document.createElement("option");
    opt.value = key;
    opt.textContent = `${data.label} – ${data.dim}`;
    el.adSize.appendChild(opt);
  });
}

function updateForm() {
  populateSizes();
  calculatePrice();
  updatePreview();
}

function countWords() {
  const txt = el.text.value.trim();
  const words = txt ? txt.split(/\s+/).filter(w => w.length).length : 0;
  const max = getCurrentMaxWords();

  el.wordCount.textContent = words;
  el.wordsLeft.textContent = Math.max(0, max - words);
  el.wordsLeft.style.color = words > max ? "#dc2626" : "#475569";
}

function calculatePrice() {
  const type = document.querySelector('input[name="adType"]:checked')?.value;
  const key = el.adSize.value;

  if (!type || !key) {
    el.base.textContent = "₹0";
    el.extra.textContent = "₹0";
    el.gst.textContent = "₹0";
    el.total.textContent = "₹0";
    return;
  }

  const data = RATE_CARD[type]?.[key];
  if (!data) return;

  const words = (el.text.value.trim().split(/\s+/) || []).filter(Boolean).length;
  const maxWords = getCurrentMaxWords();
  const extraWords = Math.max(0, words - maxWords);
  const extraCost = extraWords * EXTRA_PER_WORD;

  const subtotal = data.price + extraCost;
  const tax = Math.round(subtotal * GST_RATE);
  const final = subtotal + tax;

  el.base.textContent  = `₹${data.price.toLocaleString("en-IN")}`;
  el.extra.textContent = `₹${extraCost.toLocaleString("en-IN")}`;
  el.gst.textContent   = `₹${tax.toLocaleString("en-IN")}`;
  el.total.textContent = `₹${final.toLocaleString("en-IN")}`;
}

function updatePreview() {
  const catOption = el.category.options[el.category.selectedIndex];
  el.prevCategory.textContent = catOption?.value ? catOption.text : "— not selected —";

  const type = document.querySelector('input[name="adType"]:checked')?.value?.toUpperCase() || "—";
  const sizeOpt = el.adSize.options[el.adSize.selectedIndex];
  el.prevTypeSize.textContent = sizeOpt?.value ? `${type} – ${sizeOpt.text}` : "— not selected —";

  const isMatri = el.category.value === "matrimonials";

  el.prevTitle.innerHTML = el.title.value.trim()
    ? (isMatri ? el.title.value.trim().toUpperCase() : el.title.value.trim())
    : (isMatri ? "WANTED BRIDE" : "Your headline here");

  el.prevText.textContent = el.text.value.trim()
    || (isMatri ? "Sample matrimonial ad content..." : "Your ad content will appear here…");

  el.prevContact.textContent = el.contact.value.trim() || "Contact details here";

  const wc = (el.text.value.trim().split(/\s+/) || []).filter(Boolean).length;
  el.prevWords.textContent = `${wc} / ${getCurrentMaxWords()} words`;
}

function handleImage(e) {
  const file = e.target.files[0];
  if (!file || !file.type.startsWith("image/")) return;

  const reader = new FileReader();
  reader.onload = function(ev) {
    const url = ev.target.result;

    const previewHTML = `
      <div class="image-preview-container">
        <div class="image-preview-box"><img src="${url}" alt="Uploaded image"></div>
        <button type="button" class="remove-image-btn" onclick="removeImage()" title="Remove image">
          <i class="fas fa-times"></i>
        </button>
      </div>
    `;

    el.imgPrev.innerHTML = previewHTML;
    el.prevImage.innerHTML = `<img src="${url}" class="preview-image" alt="Ad image">`;
  };

  reader.readAsDataURL(file);
}

function removeImage() {
  el.imgPrev.innerHTML = '';
  el.prevImage.innerHTML = '';
  document.getElementById('imgUpload').value = '';
}

function proceed() {
  const required = [el.category, el.adSize, el.title, el.text, el.contact];
  let valid = true;

  required.forEach(field => {
    if (!field.value.trim()) {
      field.style.borderColor = "#dc2626";
      valid = false;
    } else {
      field.style.borderColor = "#cbd5e1";
    }
  });

  if (!valid) {
    alert("Please fill all required fields (*) marked.");
    return;
  }

  const max = getCurrentMaxWords();
  const words = (el.text.value.trim().split(/\s+/) || []).filter(Boolean).length;

  if (words > max) {
    alert(`Ad content exceeds the ${max}-word limit for this category!`);
    return;
  }

  // Set hidden fields before submit
  document.getElementById('ad_type_hidden').value =
    document.querySelector('input[name="adType"]:checked')?.value || '';

  document.getElementById('word_count_hidden').value = words;

  document.getElementById('base_price_hidden').value =
    el.base.textContent.replace('₹', '').replace(/,/g, '').trim();

  document.getElementById('extra_word_price_hidden').value =
    el.extra.textContent.replace('₹', '').replace(/,/g, '').trim();

  document.getElementById('gst_charges_hidden').value =
    el.gst.textContent.replace('₹', '').replace(/,/g, '').trim();

  document.getElementById('total_price_hidden').value =
    el.total.textContent.replace('₹', '').replace(/,/g, '').trim();

  // Submit form
  document.getElementById('classifiedForm').submit();
}

// INIT
document.addEventListener("DOMContentLoaded", function() {
  updateWordLimit();
  updateTitleHint();
  updateForm();
  countWords();
  updatePreview();
  updateCharCount();
  calculatePrice();
});
</script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
function proceed() {
    // 1️⃣ Required fields
    const category = document.getElementById('category').value.trim();
    const adSize = document.getElementById('adSize').value.trim();
    const title = document.getElementById('title').value.trim();
    const adContent = document.getElementById('text').value.trim();
    const contact = document.getElementById('contact').value.trim();
    const adType = document.querySelector('input[name="adType"]:checked')?.value || '';

    if (!category || !adSize || !title || !adContent || !contact) {
        alert("Please fill all required fields (*) marked.");
        return;
    }

    // 2️⃣ Word count & limits
    const words = adContent.split(/\s+/).filter(Boolean).length;
    const WORD_LIMITS = {
        "matrimonials": 30,
        "vacancy": 45,
        "vehicle-sale": 30,
        "property-sale": 40,
        "wanted-property": 35,
        "paying-guest": 30,
        "livestock": 25,
        "miscellaneous": 40,
        "": 50
    };
    const maxWords = WORD_LIMITS[category] ?? 50;

    if (words > maxWords) {
        alert(`Ad content exceeds the ${maxWords}-word limit for this category!`);
        return;
    }

    // 3️⃣ Get prices directly from form
    const basePrice = parseFloat(document.getElementById('base').textContent.replace('₹','').replace(/,/g,'')) || 0;
    const extraPrice = parseFloat(document.getElementById('extra').textContent.replace('₹','').replace(/,/g,'')) || 0;
    const gstCharges = parseFloat(document.getElementById('gst').textContent.replace('₹','').replace(/,/g,'')) || 0;
    const totalPrice = parseFloat(document.getElementById('total').textContent.replace('₹','').replace(/,/g,'')) || 0;

    if (!totalPrice || totalPrice == 0) {
        alert("Please select ad details first");
        return;
    }

    // 4️⃣ Set hidden fields
    document.getElementById('ad_type_hidden').value = adType;
    document.getElementById('word_count_hidden').value = words;
    document.getElementById('base_price_hidden').value = basePrice;
    document.getElementById('extra_word_price_hidden').value = extraPrice;
    document.getElementById('gst_charges_hidden').value = gstCharges;
    document.getElementById('total_price_hidden').value = totalPrice;
    
    // 5️⃣ Razorpay checkout
    var options = {
        key: "{{ config('services.razorpay.key') }}", // from .env
        amount: totalPrice * 100, // in paise
        currency: "INR",
        name: "Classified Ad Booking",
        description: "Ad Payment",
        handler: function (response) {
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('classifiedForm').submit();
        },
        prefill: {
            contact: contact
        },
        theme: {
            color: "#dc2626"
        }
    };

    var rzp = new Razorpay(options);
    rzp.open();
}
</script>
@endsection