@extends('website.layouts.app')
@section('content')

 <style>
   
   
    .editor-panel { padding: 20px; overflow-y: auto;     max-height: 95vh;}
    .preview-panel {
      background: linear-gradient(135deg, #f8f1e3 0%, #e6d9c2 100%);
      padding: 20px;
      border-top: 2px solid #d4b483;
      overflow-y: auto;
          max-height: 95vh;
    }

    .mb-0,.kyc-options label{
        margin-bottom: 0 !important;
    }
    .pricing-table-section {
      background: #fff8e1;
      border: 3px solid #f59e0b;
      border-radius: 14px;
      padding: 25px;
      margin: 35px 0;
    }
    .pricing-table-title {
      background: #f59e0b;
      color: white;
      padding: 15px;
      text-align: center;
      font-weight: 900;
      font-size: 1.2rem;
      border-radius: 8px 8px 0 0;
      margin: -25px -25px 20px -25px;
      letter-spacing: 2px;
    }
    .pricing-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 15px;
      min-width: 300px;
    }
    .pricing-table thead { background: #3f2a1e; color: white; }
    .pricing-table th, .pricing-table td {
      padding: 12px;
      border: 1px solid #d4b483;
      text-align: center;
    }
    .price-highlight {
      background: #f59e0b;
      color: white;
      font-weight: 700;
      text-align: center;
      border-radius: 6px;
      padding: 8px;
      display: inline-block;
    }
    .pricing-note {
      font-size: 0.95rem;
      color: #5c4631;
      padding: 15px;
      background: white;
      border-radius: 8px;
      border-left: 4px solid #f59e0b;
    }

    .section-title {
      font-size: 1.6rem;
      color: #3f2a1e;
      font-weight: 900;
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 5px solid #f59e0b;
      letter-spacing: 1px;
      text-align: center;
    }
    .form-group { margin-bottom: 35px; }
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: 700;
      color: #3f2a1e;
      font-size: 1rem;
    }
    input[type="text"], select, textarea {
      width: 100%;
      padding: 15px 18px;
      border: 2px solid #d4b483;
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.3s;
      background: #fffef7;
    }
    input:focus, select:focus, textarea:focus {
      outline: none;
      border-color: #f59e0b;
      box-shadow: 0 0 0 5px rgba(245, 158, 11, 0.15);
    }
    textarea { min-height: 145px; resize: vertical; }

    .word-info, .char-info {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
      padding: 10px 15px;
      background: #fff8e1;
      border-radius: 10px;
      font-size: 0.95rem;
      color: #5c4631;
    }
    .word-info strong, .char-info strong { color: #f59e0b; }

    .radio-group {
      display: flex;
      gap: 14px;
      flex-wrap: wrap;
    }
    .radio-option {
      flex: 1 1 45%;
      padding: 14px 12px;
      background: #fffef7;
      border: 2px solid #d4b483;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.25s;
      display: flex;
      align-items: center;
      gap: 10px;
      min-width: 120px;
    }
    .radio-option:hover { border-color: #f59e0b; background: #fff8e1; }
    input[type="radio"] { accent-color: #f59e0b; width: 20px; height: 20px; margin: 0; }

    .kyc-group {
      background: #fff8e1;
      border: 3px solid #f59e0b;
      border-radius: 14px;
      padding: 22px;
      margin-bottom: 35px;
    }
    .kyc-options {
      display: flex;
      gap: 18px;
      margin: 16px 0;
      flex-wrap: wrap;
    }
    .kyc-option {
      flex: 1 1 45%;
      padding: 16px;
      border: 2px solid #d4b483;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.25s;
      display: flex;
      align-items: center;
      gap: 10px;
      min-width: 140px;
    }
    .kyc-option:hover { border-color: #f59e0b; background: #fffef7; }

    .upload-box {
      border: 3px dashed #f59e0b;
      border-radius: 14px;
      padding: 40px 20px;
      text-align: center;
      background: #fffef7;
      cursor: pointer;
      transition: all 0.3s;
      margin: 12px 0;
    }
    .upload-box:hover { background: #fff8e1; border-color: #d97706; }
    .upload-box input[type="file"] { display: none; }

    .doc-upload-wrapper {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }
    .doc-upload-wrapper > div {
      flex: 1 1 45%;
      min-width: 240px;
    }

    .image-design-section {
      background: #fff8e1;
      border: 3px solid #f59e0b;
      border-radius: 14px;
      padding: 30px;
      margin-bottom: 35px;
      display: none;
    }
    .image-design-section.active { display: block; }

    .image-preview-container, .doc-preview-container {
      margin-top: 18px;
      position: relative;
      display: inline-block;
    }
    .preview-box {
      border: 3px solid #d4b483;
      border-radius: 12px;
      overflow: hidden;
      max-width: 100%;
    }
    .preview-box img { width: 100%; height: auto; display: block; }

    .remove-btn {
      position: absolute;
      top: -12px;
      right: -12px;
      background: #3f2a1e;
      color: white;
      border: none;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      font-size: 1.3rem;
      cursor: pointer;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }
    .remove-btn:hover { transform: scale(1.1); }

    .price-breakdown {
      background: #fffef7;
      border: 3px solid #f59e0b;
      border-radius: 14px;
      padding: 24px;
      margin: 35px 0;
    }
    .breakdown-item {
      display: flex;
      justify-content: space-between;
      padding: 12px 0;
      border-bottom: 1px solid #d4b483;
      font-size: 1.05rem;
    }
    .breakdown-item:last-child {
      border-bottom: none;
      font-size: 1.35rem;
      font-weight: 900;
      color: #3f2a1e;
      margin-top: 15px;
      padding-top: 15px;
      border-top: 3px solid #f59e0b;
    }

    .continue-btn {
      width: 100%;
      padding: 20px;
      background: linear-gradient(135deg, #f59e0b, #d97706);
      color: #3f2a1e;
      border: none;
      border-radius: 12px;
      font-size: 1.25rem;
      font-weight: 900;
      cursor: pointer;
      transition: all 0.3s;
      letter-spacing: 1px;
    }
    .continue-btn:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 30px rgba(245, 158, 11, 0.4);
    }

    #previewAd {
      background: white;
      border-radius: 12px;
      padding: 45px;
      min-height: 720px;
    }
    .preview-header {
      color: #3f2a1e;
      font-size: 1.5rem;
      font-weight: 900;
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 4px solid #f59e0b;
      text-align: center;
      letter-spacing: 2px;
    }
    .preview-label {
      font-size: 0.95rem;
      color: #8b6f47;
      font-weight: 700;
      text-transform: uppercase;
      margin: 28px 0 10px;
      letter-spacing: 1px;
    }
    .preview-item {
      background: #fffef7;
      padding: 18px;
      border-radius: 10px;
      border-left: 6px solid #f59e0b;
      margin-bottom: 20px;
      font-size: 1.08rem;
    }
    .preview-image {
      width: 100%;
      border-radius: 10px;
      margin-bottom: 25px;
      border: 4px solid #3f2a1e;
      max-height: 360px;
      object-fit: cover;
    }
    #prevTitle {
      font-weight: 900;
      font-size: 1.85rem;
      text-transform: uppercase;
      color: #3f2a1e;
      line-height: 1.2;
      margin-bottom: 15px;
    }

    .hidden-element { display: none !important; }
    .table-box{
        overflow:scroll;
        scrollbar-width: none;
    }

    /* Responsive adjustments */
    @media (min-width: 768px) {
      .container { grid-template-columns: 1fr 1fr; }
      .preview-panel {
        border-top: none;
        border-left: 2px solid #d4b483;
      }
      #previewAd { position: sticky; top: 20px; }
      .radio-option, .kyc-option { flex: 1; min-width: auto; }
    }

    @media (max-width: 767px) {
      .radio-group, .kyc-options { flex-direction: column; }
      .radio-option, .kyc-option { flex: 1 1 100%; }
      .doc-upload-wrapper { flex-direction: column; }
      .editor-panel{padding: 10px;}
      .pricing-table-section{
        padding: 10px;
      }
      .preview-panel{
        padding: 10px;
      }
      #previewAd{
        padding:10px;
      }
    }
  </style>



<div class="container">
<br><br><br><br><br><br>
<div class="row">
<div class="col-md-6">
  <div class="editor-panel">
    <div class="section-title">ECO EDDITION - Weekly Classified Ad</div>

    <div class="pricing-table-section">
      <div class="pricing-table-title">CLASSIFIED TEXT ADS</div>
      <div class="table-box">
        <table class="pricing-table">
            <thead>
            <tr>
                <th>Ad Type</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <tr><td><strong>Running ad</strong></td><td>Min 25 words</td><td><span class="price-highlight">₹300</span></td></tr>
            <tr><td><strong>Black Highlighted</strong></td><td>Premium Ad</td><td><span class="price-highlight">₹350</span></td></tr>
            <tr><td><strong>Box</strong></td><td>Boxed Ad</td><td><span class="price-highlight">₹400</span></td></tr>
            <tr><td><strong>Color Ad</strong></td><td>Ad in Color</td><td><span class="price-highlight">₹500</span></td></tr>
            </tbody>
        </table>
      </div>
      <div class="pricing-note">
        <strong>₹5 per word extra</strong> after 25 words (Only for Display Ads)
      </div>
    </div>
      @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
      @endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="margin:0; padding-left:18px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('classified.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return proceed(event)">
    @csrf
    <div class="form-group">
      <label>Category *</label>
      <select id="category" name="category"  onchange="updateWordLimit(); updateTitleHint(); updatePreview(); calculatePrice();">
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
          <input type="radio" id="colorAd" name="ad_type" value="color" onchange="updateForm()">
          <label class="mb-0" for="colorAd"><i class="fa fa-paint-brush"></i> Color Ad</label>
        </div>
        <div class="radio-option">
          <input type="radio" id="bwAd" name="ad_type" value="Black and White" onchange="updateForm()">
          <label class="mb-0" for="bwAd"><i class="fa fa-palette"></i> Black & White</label>
        </div>
        <div class="radio-option">
          <input type="radio" id="displayAd" name="ad_type" value="display" checked onchange="updateForm()">
          <label class="mb-0" for="displayAd"><i class="fa fa-image"></i> Classified Matter Ad</label>
        </div>
      </div>
    </div>

    <div class="form-group image-design-section" id="imageDesignSection">
      <label><i class="fa fa-palette"></i> Select Classified Matter Ad Design *</label>
      <div id="designOptionsContainer" class="radio-group" style="flex-direction:column; gap:12px;">
        <div class="radio-option" onclick="selectDisplayOption(this, 300)" style="justify-content:space-between;">
          <div style="display:flex; align-items:center; gap:12px;">
            <input type="radio" name="displayOption" value="normal" checked>
            <label class="mb-0">Ad in Normal</label>
          </div>
          <strong>₹300</strong>
        </div>
        <div class="radio-option" onclick="selectDisplayOption(this, 350)" style="justify-content:space-between;">
          <div style="display:flex; align-items:center; gap:12px;">
            <input type="radio" name="displayOption" value="highlight">
            <label class="mb-0">Ad in Highlight</label>
          </div>
          <strong>₹350</strong>
        </div>
        <div class="radio-option" onclick="selectDisplayOption(this, 400)" style="justify-content:space-between;">
          <div style="display:flex; align-items:center; gap:12px;">
            <input type="radio" name="displayOption" value="box">
            <label class="mb-0">Ad in Box</label>
          </div>
          <strong>₹400</strong>
        </div>
        <div class="radio-option" onclick="selectDisplayOption(this, 500)" style="justify-content:space-between;">
          <div style="display:flex; align-items:center; gap:12px;">
            <input type="radio" name="displayOption" value="color">
            <label class="mb-0">Ad in Color</label>
          </div>
          <strong>₹500</strong>
        </div>
      </div>
     
    </div>

    <div class="form-group" id="sizeGroup">
      <label>Ad Size *</label>
      <select id="adSize"  name="ad_size" onchange="updateWordLimit(); calculatePrice(); updatePreview();">
        <option value="">— Select size —</option>
      </select>
    </div>

    <div class="form-group" id="imageUploadSection">
      <label>Add Article Image</label>
      <div class="upload-box" onclick="document.getElementById('imgUpload').click()">
        <i class="fa fa-cloud-upload-alt fa-3x" style="color:#f59e0b; margin-bottom:16px;"></i>
        <div style="font-weight:600;">Click or drag image here</div>
        <small>JPG / PNG • Max 5 MB</small>
        <input type="file" id="imgUpload" name="article_image" accept="image/*" onchange="handleImage(event)">
      </div>
      <div id="imgPreview"></div>
    </div>

    <div class="form-group">
      <label>Headline / Title *</label>
      <input type="text" id="title"  name="title"  placeholder="e.g. WANTED BRIDE" maxlength="100" oninput="updateCharCount(); updatePreview()">
      <div class="char-info">
        <span>Characters: <strong id="charCount">0</strong>/100</span>
      </div>
    </div>

    <div class="form-group">
      <label>Ad Content * <small id="wordLimitNote">(No word limit)</small></label>
      <textarea id="text" name="ad_content"  placeholder="Write your ad here... (Email will auto add ₹50)" oninput="countWords(); updatePreview(); calculatePrice()"></textarea>
      <div class="word-info">
        <span>Words: <strong id="wordCount">0</strong></span>
        <span>Left: <strong id="wordsLeft">No limit</strong></span>
      </div>
    </div>

    <div class="form-group">
      <label>Contact Details *</label>
      <input type="text" id="contact" name="contact_details" placeholder="e.g. Call/WhatsApp: 99151-25379" oninput="updatePreview()">
    </div>

    <!-- KYC Section -->
    <div class="form-group kyc-group">
      <label><i class="fa fa-shield-alt"></i> KYC Mandatory *</label>
      <div class="kyc-options">
        <div class="kyc-option">
          <input type="radio" id="kycAadhaar" name="kyc_type" value="aadhaar" onchange="updateKycUploadUI(); updatePreview()" >
          <label for="kycAadhaar"><strong>Aadhaar Number</strong></label>
        </div>
        <div class="kyc-option">
          <input type="radio" id="kycPAN" name="kyc_type" value="pan" onchange="updateKycUploadUI(); updatePreview()">
          <label for="kycPAN"><strong>PAN Number</strong></label>
        </div>
      </div>

      <input type="text" id="kycNumber" name="kyc_number" placeholder="Enter Aadhaar or PAN Number" maxlength="20" oninput="updatePreview()">

      <div class="doc-group" style="margin-top:20px;">
        <label><i class="fa fa-file-upload"></i> Upload Document</label>
        <div id="docUploadAreas"></div>
        <div id="docPreviews"></div>
      </div>
    </div>

    <div class="price-breakdown">
      <div class="breakdown-item"><span>Base Price</span><strong id="base">₹0</strong></div>
      <div class="breakdown-item"><span>Extra Words (₹5 each)</span><strong id="extra">₹0</strong></div>
      <div class="breakdown-item"><span>Email ID Charge</span><strong id="emailCharge">₹0</strong></div>
      <div class="breakdown-item"><span style="font-size:1.35rem">TOTAL PAYABLE</span><strong id="total" style="font-size:1.5rem">₹0</strong></div>
    </div>
      <input type="hidden" id="selectedDisplayPrice" value="300">
      <input type="hidden" id="selectedDisplayType" value="normal">

   <!--   <input type="hidden" name="display_type" id="display_type_input" value="normal">
      <input type="hidden" name="display_price" id="display_price_input" value="300">-->
      <input type="hidden" name="ad_size_label" id="ad_size_label_input">

      <input type="hidden" name="word_count" id="word_count_input" value="0">
      <input type="hidden" name="base_price" id="base_price_input" value="0">
      <input type="hidden" name="extra_words_price" id="extra_words_price_input" value="0">
      <input type="hidden" name="email_charge" id="email_charge_input" value="0">
      <input type="hidden" name="total_price" id="total_price_input" value="0">
      <!--<button class="continue-btn" onclick="proceed()">PROCEED TO PAYMENT</button>-->
      
<button type="submit" class="continue-btn">PROCEED TO PAYMENT</button>
  </form>
  </div>
</div>
<div class="col-md-6">
    <div class="preview-panel">
    <div class="preview-header"><i class="fa fa-eye"></i> Live Newspaper Preview</div>
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
      <div class="preview-label">KYC Details</div>
      <div class="preview-item" id="prevKYC">KYC information will appear here</div>
      <div class="preview-label">Word Count</div>
      <div class="preview-item"><strong id="prevWords">0 words</strong></div>
    </div>
  </div>
  </div>
</div>



</div>

<script>
const RATE_CARD = {
  color: {
    "fullpage-color": { label: "Full Page (FRONT)", dim: "29.0 × 25 cm", price: 30000 },
    "fullpage-inside-color": { label: "Full Page (Front Inside)", dim: "32.3 × 25 cm", price: 28000 },
    "backpage-color": { label: "Back Page", dim: "32.3 × 25 cm", price: 24000 },
    "backpage-inside-color": { label: "Back Page (Inside)", dim: "32.3 × 25 cm", price: 20000 },
    "halfpage-sitting-color": { label: "Half Page (Sitting)", dim: "16.13 × 25 cm", price: 10000 },
    "halfpage-standing-color": { label: "Half Page (Standing)", dim: "32.3 × 12.5 cm", price: 10000 },
    "quarterpage-color": { label: "Quarter Page", dim: "16.13 × 12.5 cm", price: 5000 },
    "1_8th-color": { label: "1/8th Page", dim: "8.1 × 12.5 cm", price: 2500 },
    "1_16th-pic-color": { label: "1/16th Page with pic", dim: "8.17 × 6.25 cm", price: 1600 },
    "1_16th-text-color": { label: "1/16th Page plain text", dim: "8.17 × 6.25 cm", price: 1400 }
  },
  bw: {
    "fullpage-bw": { label: "Full Page (FRONT)", dim: "29 × 25 cm", price: 26000 },
    "fullpage-inside-bw": { label: "Full Page (Front Inside)", dim: "32.3 × 25 cm", price: 22000 },
    "backpage-bw": { label: "Back Page", dim: "32.3 × 25 cm", price: 18000 },
    "backpage-inside-bw": { label: "Back Page (Inside)", dim: "32.3 × 25 cm", price: 14000 },
    "halfpage-sitting-bw": { label: "Half Page (Sitting)", dim: "16.1 × 25 cm", price: 7000 },
    "halfpage-standing-bw": { label: "Half Page (Standing)", dim: "32.3 × 12.5 cm", price: 7000 },
    "quarterpage-bw": { label: "Quarter Page", dim: "16.1 × 12.5 cm", price: 3500 },
    "1_8th-bw": { label: "1/8th Page", dim: "8.1 × 12.5 cm", price: 2000 },
    "1_16th-pic-bw": { label: "1/16th Page with pic", dim: "6.25 × 8.17 cm", price: 1500 }
  }
};

const EXTRA_PER_WORD = 5;
const MIN_WORDS = 25;
const EMAIL_EXTRA = 50;

const el = {
  category: document.getElementById("category"),
  adSize: document.getElementById("adSize"),
  title: document.getElementById("title"),
  text: document.getElementById("text"),
  contact: document.getElementById("contact_details"),
  kycNumber: document.getElementById("kycNumber"),
  wordCount: document.getElementById("wordCount"),
  wordsLeft: document.getElementById("wordsLeft"),
  charCount: document.getElementById("charCount"),
  base: document.getElementById("base"),
  extra: document.getElementById("extra"),
  emailCharge: document.getElementById("emailCharge"),
  total: document.getElementById("total"),
  prevCategory: document.getElementById("prevCategory"),
  prevTypeSize: document.getElementById("prevTypeSize"),
  prevTitle: document.getElementById("prevTitle"),
  prevText: document.getElementById("prevText"),
  prevContact: document.getElementById("prevContact"),
  prevKYC: document.getElementById("prevKYC"),
  prevWords: document.getElementById("prevWords"),
  prevImage: document.getElementById("previewImage"),
  imgPrev: document.getElementById("imgPreview"),
  docPreviews: document.getElementById("docPreviews"),
  docUploadAreas: document.getElementById("docUploadAreas"),
  imageDesignSection: document.getElementById("imageDesignSection"),
  imageUploadSection: document.getElementById("imageUploadSection"),
  sizeGroup: document.getElementById("sizeGroup")
};

let aadhaarFront = null;
let aadhaarBack = null;
let panFile = null;

function updateKycUploadUI() {
  const selected = document.querySelector('input[name="kyc_type"]:checked')?.value;
  let html = '';

  if (selected === 'aadhaar') {
    html = `
      <div class="doc-upload-wrapper">
        <div class="upload-box" onclick="document.getElementById('aadhaarFrontUpload').click()">
          <i class="fa fa-cloud-upload-alt fa-3x" style="color:#f59e0b; margin-bottom:16px;"></i>
          <div style="font-weight:600;">Aadhaar Front</div>
          <small>JPG, PNG, PDF • Max 5 MB</small>
          <input type="file" id="aadhaarFrontUpload" name="aadhaar_front" accept="image/*,.pdf" onchange="handleAadhaarFront(event)">
        </div>
        <div class="upload-box" onclick="document.getElementById('aadhaarBackUpload').click()">
          <i class="fa fa-cloud-upload-alt fa-3x" style="color:#f59e0b; margin-bottom:16px;"></i>
          <div style="font-weight:600;">Aadhaar Back</div>
          <small>JPG, PNG, PDF • Max 5 MB</small>
          <input type="file" id="aadhaarBackUpload"  name="aadhaar_back" accept="image/*,.pdf" onchange="handleAadhaarBack(event)">
        </div>
      </div>
    `;
  } else if (selected === 'pan') {
    html = `
      <div class="upload-box" onclick="document.getElementById('panUpload').click()">
        <i class="fa fa-cloud-upload-alt fa-3x" style="color:#f59e0b; margin-bottom:16px;"></i>
        <div style="font-weight:600;">Upload PAN Card</div>
        <small>JPG, PNG, PDF • Max 5 MB</small>
        <input type="file" id="panUpload"  name="pan_file" accept="image/*,.pdf" onchange="handlePan(event)">
      </div>
    `;
  }

  el.docUploadAreas.innerHTML = html;
  renderDocPreviews();
}

function renderDocPreviews() {
  let html = '';
  const type = document.querySelector('input[name="kyc_type"]:checked')?.value;

  if (type === 'aadhaar') {
    if (aadhaarFront) html += createPreview('Aadhaar Front', aadhaarFront);
    if (aadhaarBack) html += createPreview('Aadhaar Back', aadhaarBack);
  } else if (type === 'pan') {
    if (panFile) html += createPreview('PAN Card', panFile);
  }

  el.docPreviews.innerHTML = html;
}

function createPreview(title, file) {
  const isPDF = file.type === "application/pdf";
  return `
    <div class="doc-preview-container" style="margin:15px 0;">
      <strong>${title}</strong>
      <div class="preview-box" ${isPDF ? 'style="padding:30px;text-align:center;"' : ''}>
        ${isPDF ? 
          `<i class="fa fa-file-pdf fa-4x" style="color:#dc2626"></i><br><strong>${file.name}</strong>` :
          `<img src="${file.url}" alt="${title}">`
        }
      </div>
      <button class="remove-btn" onclick="remove${title.replace(/\s+/g,'')}()">×</button>
    </div>
  `;
}

function handleAadhaarFront(e) {
  handleFileUpload(e, (data) => { aadhaarFront = data; renderDocPreviews(); });
}
function handleAadhaarBack(e) {
  handleFileUpload(e, (data) => { aadhaarBack = data; renderDocPreviews(); });
}
function handlePan(e) {
  handleFileUpload(e, (data) => { panFile = data; renderDocPreviews(); });
}

function handleFileUpload(e, callback) {
  const file = e.target.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = ev => {
    callback({
      url: ev.target.result,
      type: file.type,
      name: file.name
    });
  };
  reader.readAsDataURL(file);
}

function removeAadhaarFront() { aadhaarFront = null; document.getElementById('aadhaarFrontUpload').value = ''; renderDocPreviews(); }
function removeAadhaarBack() { aadhaarBack = null; document.getElementById('aadhaarBackUpload').value = ''; renderDocPreviews(); }
function removePANCard() { panFile = null; document.getElementById('panUpload').value = ''; renderDocPreviews(); }

function hasImageUploaded() {
  return el.imgPrev.innerHTML.trim() !== '';
}

function getMaxWords() {
  const ad_type = document.querySelector('input[name="ad_type"]:checked')?.value;
  if (ad_type === 'display') return 999999;
  const sizeKey = el.adSize.value;
  if (!sizeKey) return 999999;
  const hasPic = hasImageUploaded();
  if (sizeKey.includes("1_8th")) return hasPic ? 60 : 70;
  if (sizeKey.includes("1_16th")) return hasPic ? 45 : 55;
  return 999999;
}

function updateWordLimit() {
  const ad_type = document.querySelector('input[name="ad_type"]:checked')?.value;
  const max = getMaxWords();
  let note = "(No word limit)";
  if (ad_type !== 'display' && max !== 999999) {
    note = `(Max ${max} words${hasImageUploaded() ? " with picture" : ""})`;
  }
  document.getElementById("wordLimitNote").innerHTML = note;
  countWords();
}

function populateSizes() {
  const type = document.querySelector('input[name="ad_type"]:checked')?.value || "color";
  el.adSize.innerHTML = '<option value="">— Select size —</option>';
  if (type === 'display') return;
  const group = RATE_CARD[type] || {};
  Object.entries(group).forEach(([key, data]) => {
    const opt = document.createElement("option");
    opt.value = key;
    opt.textContent = `${data.label} – ${data.dim}`;
    el.adSize.appendChild(opt);
  });
}

function updateForm() {
  const ad_type = document.querySelector('input[name="ad_type"]:checked')?.value;

  if (ad_type === 'display') {
    el.imageDesignSection.classList.add('active');
    el.imageUploadSection.classList.add('hidden-element');
    el.sizeGroup.classList.add('hidden-element');
  } else {
    el.imageDesignSection.classList.remove('active');
    el.imageUploadSection.classList.remove('hidden-element');
    el.sizeGroup.classList.remove('hidden-element');
  }

  populateSizes();
  updateWordLimit();
  calculatePrice();
  updatePreview();
}

function selectDisplayOption(elClicked, basePrice) {
  document.querySelectorAll('#designOptionsContainer .radio-option').forEach(opt => {
    opt.style.background = '#fffef7';
    opt.querySelector('input[type="radio"]').checked = false;
  });
  elClicked.style.background = '#fff8e1';
  elClicked.querySelector('input[type="radio"]').checked = true;

  document.getElementById("selectedDisplayPrice").value = basePrice;
  document.getElementById("selectedDisplayType").value = elClicked.querySelector('input').value;

  calculatePrice();
  updatePreview();
}

function countWords() {
  const txt = el.text.value.trim();
  const words = txt ? txt.split(/\s+/).filter(w => w.length > 0).length : 0;
  el.wordCount.textContent = words;
  const max = getMaxWords();
  if (max === 999999) {
    el.wordsLeft.textContent = "No limit";
    el.wordsLeft.style.color = "#16a34a";
  } else {
    const left = Math.max(0, max - words);
    el.wordsLeft.textContent = left;
    el.wordsLeft.style.color = (words > max) ? "#dc2626" : "#16a34a";
  }
}

function hasEmail() {
  return /@/.test(el.text.value);
}

function calculatePrice() {
  const ad_type = document.querySelector('input[name="ad_type"]:checked')?.value;
  let basePrice = 0;

  if (ad_type === 'display') {
    basePrice = parseInt(document.getElementById("selectedDisplayPrice").value) || 300;
  } else {
    const key = el.adSize.value;
    if (!key) {
      resetPrice();
      return;
    }
    const data = RATE_CARD[ad_type]?.[key];
    if (!data) return;
    basePrice = data.price;
  }

  const words = el.text.value.trim().split(/\s+/).filter(Boolean).length;
  let extraCost = 0;
  const maxWords = getMaxWords();

  if (words > maxWords && maxWords !== 999999) {
    extraCost = (words - maxWords) * EXTRA_PER_WORD;
  } else if (ad_type === 'display' && words > MIN_WORDS) {
    extraCost = (words - MIN_WORDS) * EXTRA_PER_WORD;
  }

  const emailExtra = hasEmail() ? EMAIL_EXTRA : 0;

  const subtotal = basePrice + extraCost + emailExtra;

  el.base.textContent = `₹${basePrice.toLocaleString("en-IN")}`;
  el.extra.textContent = `₹${extraCost.toLocaleString("en-IN")}`;
  el.emailCharge.textContent = `₹${emailExtra.toLocaleString("en-IN")}`;
  el.total.textContent = `₹${subtotal.toLocaleString("en-IN")}`;
}

function resetPrice() {
  el.base.textContent = el.extra.textContent = el.emailCharge.textContent = el.total.textContent = "₹0";
}

function updateCharCount() {
  el.charCount.textContent = el.title.value.length;
}

function updateTitleHint() {
  const hints = {
    matrimonials: "e.g. WANTED BRIDE",
    vacancy: "e.g. HIRING ACCOUNTANT",
    "vehicle-sale": "e.g. SELLING SWIFT CAR",
    "property-sale": "e.g. 2BHK APARTMENT",
    "wanted-property": "e.g. WANTED APARTMENT",
    "paying-guest": "e.g. PG FOR WORKING PROFESSIONALS",
    livestock: "e.g. SELLING COWS",
    miscellaneous: "e.g. GENERAL ANNOUNCEMENT"
  };
  el.title.placeholder = hints[el.category.value] || "e.g. YOUR HEADLINE";
}

function updatePreview() {
  const catOption = el.category.options[el.category.selectedIndex];
  el.prevCategory.textContent = catOption?.value ? catOption.text : "— not selected —";

  const ad_type = document.querySelector('input[name="ad_type"]:checked')?.value?.toUpperCase() || "—";
  let typeSizeText = "— not selected —";

  if (ad_type === "DISPLAY") {
    const selectedType = document.getElementById("selectedDisplayType").value || "normal";
    const niceName = { normal: "Ad in Normal", highlight: "Ad in Highlight", box: "Ad in Box", color: "Ad in Color" }[selectedType] || "Ad in Normal";
    typeSizeText = `DISPLAY – ${niceName}`;
  } else {
    const sizeOpt = el.adSize.options[el.adSize.selectedIndex];
    typeSizeText = sizeOpt?.value ? `${ad_type} – ${sizeOpt.text}` : "— not selected —";
  }
  el.prevTypeSize.textContent = typeSizeText;

  el.prevTitle.textContent = el.title.value.trim() || "Your headline here";
  el.prevText.textContent = el.text.value.trim() || "Your ad content will appear here…";
  el.prevContact.textContent = el.contact_details.value.trim() || "Contact details here";

  const kyc_typeEl = document.querySelector('input[name="kyc_type"]:checked');
  const kycNum = el.kycNumber.value.trim();
  el.prevKYC.innerHTML = (kyc_typeEl && kycNum) ?
    `<strong>${kyc_typeEl.value.toUpperCase()}:</strong> ${kycNum}` :
    "KYC information will appear here";

  const wc = el.text.value.trim().split(/\s+/).filter(Boolean).length;
  el.prevWords.textContent = `${wc} words`;
}

function handleImage(e) {
  const file = e.target.files[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = ev => {
    const url = ev.target.result;
    el.imgPrev.innerHTML = `<div class="image-preview-container"><div class="preview-box"><img src="${url}" alt="Image"></div><button class="remove-btn" onclick="removeImage()">×</button></div>`;
    el.prevImage.innerHTML = `<img src="${url}" class="preview-image" alt="Ad image">`;
    updateWordLimit();
    calculatePrice();
  };
  reader.readAsDataURL(file);
}

function removeImage() {
  el.imgPrev.innerHTML = '';
  el.prevImage.innerHTML = '';
  document.getElementById('imgUpload').value = '';
  updateWordLimit();
  calculatePrice();
}

// function proceed() {
//   if (!el.category.value || !el.title.value.trim() || !el.text.value.trim() || !el.contact.value.trim()) {
//     alert("Please fill all required fields (*)");
//     return;
//   }

//   const kyc_type = document.querySelector('input[name="kyc_type"]:checked')?.value;
//   if (!kyc_type || !el.kycNumber.value.trim()) {
//     alert("KYC is mandatory!");
//     return;
//   }

//   if (kyc_type === 'aadhaar' && (!aadhaarFront || !aadhaarBack)) {
//     alert("Please upload both sides of Aadhaar card!");
//     return;
//   }
//   if (kyc_type === 'pan' && !panFile) {
//     alert("Please upload PAN card!");
//     return;
//   }

//   const words = el.text.value.trim().split(/\s+/).filter(Boolean).length;
//   const max = getMaxWords();
//   if (max !== 999999 && words > max) {
//     alert(`Maximum ${max} words allowed for this size.`);
//     return;
//   }
//   if (words < MIN_WORDS) {
//     alert(`Minimum ${MIN_WORDS} words required.`);
//     return;
//   }

//   alert("Ad is ready!\n\nProceeding to payment...");
// }


function proceed(event) {
  event.preventDefault();

  // if (!el.category.value || !el.title.value.trim() || !el.contact_details.value.trim()) {
  //   alert("Please fill all required fields (*)");
  //   return false;
  // }

  const kycType = document.querySelector('input[name="kyc_type"]:checked')?.value;
  if (!kycType || !el.kycNumber.value.trim()) {
    alert("KYC is mandatory!");
    return false;
  }

  if (kycType === 'aadhaar') {
    const frontInput = document.getElementById('aadhaarFrontUpload');
    const backInput = document.getElementById('aadhaarBackUpload');

    if ((!frontInput || !frontInput.files.length) || (!backInput || !backInput.files.length)) {
      alert("Please upload both sides of Aadhaar card!");
      return false;
    }
  }

  if (kycType === 'pan') {
    const panInput = document.getElementById('panUpload');
    if (!panInput || !panInput.files.length) {
      alert("Please upload PAN card!");
      return false;
    }
  }

  const words = el.text.value.trim().split(/\s+/).filter(Boolean).length;
  const max = getMaxWords();
  if (max !== 999999 && words > max) {
    alert(`Maximum ${max} words allowed for this size.`);
    return false;
  }

  if (words < MIN_WORDS) {
    alert(`Minimum ${MIN_WORDS} words required.`);
    return false;
  }

  // hidden inputs sync before submit
  document.getElementById("display_type_input").value = document.getElementById("selectedDisplayType").value || '';
  document.getElementById("display_price_input").value = document.getElementById("selectedDisplayPrice").value || 0;

  const sizeSelect = document.getElementById("adSize");
  document.getElementById("ad_size_label_input").value =
    sizeSelect.options[sizeSelect.selectedIndex]?.text || '';

  document.getElementById("word_count_input").value = words;
  document.getElementById("base_price_input").value = parseInt(el.base.textContent.replace(/[^\d]/g, '')) || 0;
  document.getElementById("extra_words_price_input").value = parseInt(el.extra.textContent.replace(/[^\d]/g, '')) || 0;
  document.getElementById("email_charge_input").value = parseInt(el.emailCharge.textContent.replace(/[^\d]/g, '')) || 0;
  document.getElementById("total_price_input").value = parseInt(el.total.textContent.replace(/[^\d]/g, '')) || 0;

  event.target.submit();
  return true;
}

// Input restriction
document.getElementById("text").addEventListener("input", function() {
  let val = this.value;
  val = val.replace(/[^a-zA-Z0-9\s.,@]/g, '');
  this.value = val;
  countWords();
  updatePreview();
  calculatePrice();
});

// Initialize everything
document.addEventListener("DOMContentLoaded", () => {
  updateForm();
  updateWordLimit();
  countWords();
  updatePreview();
  calculatePrice();
  document.getElementById('kycAadhaar').checked = true;
  updateKycUploadUI();
});
</script>

@endsection