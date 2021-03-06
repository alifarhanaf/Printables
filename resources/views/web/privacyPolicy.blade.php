@include('web.includes.header')
@if ($errors->any() )
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@include('web.includes.subheader')

<div class="container">
    <div class="content">
        <h5 style="text-align: center; margin:20px; font-size:2rem; text-transform: uppercase; font-weight:700; color: #84a0ac !important; ">
            Privacy Policy
        </h5>
        {{-- <p style="margin-bottom: 0;" align="CENTER" class="pt-5"><span style="font-size: large;"><strong>Privacy Policy</strong></span>
        </p> --}}
       
        <p style="margin-bottom: 0;">-----</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Protecting your private information is our priority. This Statement of Privacy
            applies to the <a href="http://www.geneologie.org">www.geneologie.org</a> and College Thread LLC, DBA
            Geneologie and governs data collection and usage. For the purposes of this Privacy Policy, unless
            otherwise noted, all references to College Thread LLC, DBA Geneologie include <a href="http://www.geneologie.org">www.geneologie.org</a> and Geneologie. The Geneologie website
            is a ecommerce site. By using the Geneologie website, you consent to the data practices described in
            this statement.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Collection of your Personal Information</h5>
        <p style="margin-bottom: 0;">Geneologie may collect personally identifiable information, such as your name.
            If you purchase Geneologie's products and services, we collect billing and credit card information.
            This information is used to complete the purchase transaction. We may gather additional personal or
            non-personal information in the future.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Information about your computer hardware and software may be automatically
            collected by Geneologie. This information can include: your IP address, browser type, domain names,
            access times and referring website addresses. This information is used for the operation of the service,
            to maintain quality of the service, and to provide general statistics regarding use of the Geneologie
            website.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Please keep in mind that if you directly disclose personally identifiable
            information or personally sensitive data through Geneologie's public message boards, this information
            may be collected and used by others.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Geneologie encourages you to review the privacy statements of websites you
            choose to link to from Geneologie so that you can understand how those websites collect, use and share
            your information. Geneologie is not responsible for the privacy statements or other content on websites
            outside of the Geneologie website.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Use of your Personal Information</h5>
        <p style="margin-bottom: 0;">Geneologie collects and uses your personal information to operate its
            website(s) and deliver the services you have requested.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Geneologie may also use your personally identifiable information to inform you
            of other products or services available from Geneologie and its affiliates. Geneologie may also
            contact you via surveys to conduct research about your opinion of current services or of potential new
            services that may be offered.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Geneologie does not sell, rent or lease its customer lists to third
            parties.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Geneologie may share data with trusted partners to help perform statistical
            analysis, send you email or postal mail, provide customer support, or arrange for deliveries. All such
            third parties are prohibited from using your personal information except to provide these services to
            Geneologie, and they are required to maintain the confidentiality of your information.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Geneologie may keep track of the websites and pages our users visit within
            Geneologie, in order to determine what Geneologie services are the most popular. This data is used to
            deliver customized content and advertising within Geneologie to customers whose behavior indicates that
            they are interested in a particular subject area.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Geneologie will disclose your personal information, without notice, only if
            required to do so by law or in the good faith belief that such action is necessary to: (a) conform to
            the edicts of the law or comply with legal process served on Geneologie or the site; (b) protect and
            defend the rights or property of Geneologie; and, (c) act under exigent circumstances to protect the
            personal safety of users of Geneologie, or the public.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Use of Cookies</h5>
        <p style="margin-bottom: 0;">The Geneologie website may use "cookies" to help you personalize your online
            experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies
            cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to
            you, and can only be read by a web server in the domain that issued the cookie to you.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">One of the primary purposes of cookies is to provide a convenience feature to
            save you time. The purpose of a cookie is to tell the Web server that you have returned to a specific
            page. For example, if you personalize Geneologie pages, or register with Geneologie site or services,
            a cookie helps Geneologie to recall your specific information on subsequent visits. This simplifies the
            process of recording your personal information, such as billing addresses, shipping addresses, and so
            on. When you return to the same Geneologie website, the information you previously provided can be
            retrieved, so you can easily use the Geneologie features that you customized.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">You have the ability to accept or decline cookies. Most Web browsers
            automatically accept cookies, but you can usually modify your browser setting to decline cookies if you
            prefer. If you choose to decline cookies, you may not be able to fully experience the interactive
            features of the Geneologie services or websites you visit.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Security of your Personal Information</h5>
        
        <p style="margin-bottom: 0;">Geneologie secures your personal information from unauthorized access, use or
            disclosure. When personal information (such as a credit card number) is transmitted to other websites,
            it is protected through the use of encryption, such as the Secure Sockets Layer (SSL) protocol.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
      
        <h5 class="TandS">Children Under Thirteen</h5>
        <p style="margin-bottom: 0;">Geneologie does not knowingly collect personally identifiable information from
            children under the age of thirteen. If you are under the age of thirteen, you must ask your parent or
            guardian for permission to use this website.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Opt-Out &amp; Unsubscribe</h5>
        <p style="margin-bottom: 0;">We respect your privacy and give you an opportunity to opt-out of receiving
            announcements of certain information. Users may opt-out of receiving any or all communications from
            Geneologie by contacting us here:</p>
        <p style="margin-bottom: 0;">- Web page: _________________</p>
        <p style="margin-bottom: 0;">- Email: <a href="mailto:Support@geneologie.org">Support@geneologie.org</a></p>
        <p style="margin-bottom: 0;">- Phone: _________________</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Changes to this Statement</h5>
        <p style="margin-bottom: 0;">Geneologie will occasionally update this Statement of Privacy to reflect
            company and customer feedback. Geneologie encourages you to periodically review this Statement to be
            informed of how Geneologie is protecting your information.</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <h5 class="TandS">Contact Information</h5>
        <p style="margin-bottom: 0;">Geneologie welcomes your questions or comments regarding this Statement of
            Privacy. If you believe that Geneologie has not adhered to this Statement, please contact Geneologie
            at:</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">College Thread LLC, DBA Geneologie</p>
        <p style="margin-bottom: 0;">8789 San Jose boulevard , suite 305</p>
        <p style="margin-bottom: 0;">Jacksonville, Florida 32217</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Email Address:</p>
        <p style="margin-bottom: 0;"><a href="mailto:support@geneologie.org">support@geneologie.org</a></p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">Effective as of January 12, 2015</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
        <p style="margin-bottom: 0;">&nbsp;</p>
    </div>
</div>






@include('web.includes.subfooter')
@include('web.includes.footer')