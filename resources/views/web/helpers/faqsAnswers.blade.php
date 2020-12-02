<div  class="Order_price spacing_bottom" >
    @foreach ($printTypeFaqs as $faq)
    <label for="Order_price">
        <input type="hidden" id="faqIDs" name="faqIds[]" value="{{$faq->id}}">
        {{$faq->questions}}
    </label>
    <select style="margin-bottom:1rem;" name="answers[]" id="faqanswers" class="form_class form-control">
        @foreach ($faq->answers as $ans)
        <option value="{{$ans->id}}">{{$ans->answers}}</option>
        @endforeach
    </select>
    @endforeach
</div>