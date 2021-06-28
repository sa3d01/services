<select class="border-0 Langchange">
    <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>اللغة العربية</option>
    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
</select>
