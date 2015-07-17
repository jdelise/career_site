<Response>
    <Sms>You got the lead! Please check lead router for details.</Sms>
    <Redirect>http://crm.myc21scheetz.com/twilio_demo/index/{!!urlencode($from_phone)!!}/{{$zipcode}}</Redirect>
</Response>