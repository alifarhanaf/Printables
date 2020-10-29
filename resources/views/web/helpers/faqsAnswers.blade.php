<div  class="Order_price spacing_bottom" >
    @foreach ($printTypeFaqs as $faq)
    <label for="Order_price">
        <input type="hidden" id="faqIDs" name="faqIDs[]" value="{{$faq->id}}">
        {{$faq->questions}}
    </label>
    <select name="answers[]" id="faqanswers" class="form_class form-control">
        @foreach ($faq->answers as $ans)
        <option value="{{$ans->id}}">{{$ans->answers}}</option>
        @endforeach
    </select>
    @endforeach
</div>