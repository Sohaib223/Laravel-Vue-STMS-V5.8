<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
  <title>Email Verification</title>

  <style type="text/css">
    body {
      width: 100%;
      background-color: #383434;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      mso-margin-top-alt: 0px;
      mso-margin-bottom-alt: 0px;
      mso-padding-alt: 0px 0px 0px 0px;
    }

    p,
    h1,
    h2,
    h3,
    h4 {
      margin-top: 0;
      margin-bottom: 0;
      padding-top: 0;
      padding-bottom: 0;
    }

    span.preheader {
      display: none;
      font-size: 1px;
    }

    html {
      width: 100%;
    }

    table {
      font-size: 12px;
      border: 0;
    }

    .menu-space {
      padding-right: 25px;
    }

    a,
    a:hover {
      text-decoration: none;
      color: #fff;
    }

    @media only screen and (max-width: 640px) {
      body {
        width: auto !important;
      }
      table [class="main"] {
        width: 440px !important;
      }
      table [class="two-left"] {
        width: 420px !important;
        margin: 0px auto;
      }
      table [class="full"] {
        width: 100% !important;
        margin: 0px auto;
      }
      table [class="two-left-inner"] {
        width: 400px !important;
        margin: 0px auto;
      }
      table [class="menu-icon"] {
        display: none;
      }
    }

    @media only screen and (max-width: 479px) {
      body {
        width: auto !important;
      }
      table [class="main"] {
        width: 310px !important;
      }
      table [class="two-left"] {
        width: 300px !important;
        margin: 0px auto;
      }
      table [class="full"] {
        width: 100% !important;
        margin: 0px auto;
      }
      table [class="two-left-inner"] {
        width: 280px !important;
        margin: 0px auto;
      }
      table [class="menu-icon"] {
        display: none;
      }
    }
  </style>

</head>

<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <!--Main Table Start-->

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#383434">
    <tr>
      <td align="center" valign="middle">


        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td height="90" align="center" valign="top" style="font-size:90px; line-height:90px;">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#3f9ce8" style="-moz-border-radius: 25px 25px 0px 0px; border-radius: 25px 25px 0px 0px;">
                    <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">

                          <table border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" valign="middle"><a href="#"><img editable="true" mc:edit="bm16-01" src="{{asset('uploads/logo.png')}}" width="105" height="40" alt="" /></a></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td height="20" align="center" valign="top" style="font-size:20px; line-height:20px;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#FFFFFF">
                    <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td height="70" align="center" valign="top" style="font-size:70px; line-height:70px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">
                          <table width="70" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" valign="top"><img editable="true" mc:edit="bm16-02" src="{{asset('uploads/.png')}}" width="70" height="70"
                                  alt="" style="-moz-border-radius: 70px; border-radius: 70px;" /></td>
                            </tr>

                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">
                          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

                            <tr>
                              <td height="10" align="center" valign="top" style="font-size:10px; line-height:10px;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:18px; color:#000000; font-weight:normal; line-height:40px;"
                                mc:edit="bm16-03">
                                <multiline>Hi,{{$customer->name}}</multiline>
                              </td>
                            </tr>

                            <tr>
                              <td height="5" align="center" valign="top" style="font-size:5px; line-height:5px;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" valign="top" style="font-family:'Open Sans', sans-serif, Verdana; font-size:15px; color:#4c4c4c; font-weight:normal; line-height:24px;"
                                mc:edit="bm16-04">
                                <multiline>Thankyou For Registration.<br> Confirm Your Email Address By Clicking On a Link Below.</multiline>
                              </td>
                            </tr>
                            <tr>
                              <td height="20" align="center" valign="top">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="center" valign="top">
                                <table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="50" align="center" valign="middle" bgcolor="#3f9ce8" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#FFF; font-weight:bold; -moz-border-radius: 30px; border-radius: 30px;"
                                      mc:edit="bm16-05">
                                      <multiline><a href="{{ $mypath.'?verified=1' }}" style="text-decoration:none; color:#FFF;">Confirm</a></multiline>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td height="60" align="center" valign="top" style="font-size:60px; line-height:60px;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#3f9ce8" style="font-family:'Open Sans', sans-serif, Verdana; font-size:12px; color:#FFF; font-weight:normal; line-height:20px; padding:30px 50px; -moz-border-radius:0px 0px 25px 25px; border-radius:0px 0px 25px 25px;"
                    mc:edit="bm16-06">
                    <multiline>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque semper condimentum lacus eget blandit.
                      Etiam lobortis dolor ex, sed dictum velit suscipit sed. Nulla facilisi.</multiline>
                  </td>
                </tr>

              </table>
            </td>
          </tr>
        </table>

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top">
                    <table width="350" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td height="35" align="center" valign="top" style="font-size:35px; line-height:35px;">&nbsp;</td>
                      </tr>

                      <tr>
                        <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#FFF; font-weight:normal; line-height:28px;"
                          mc:edit="bm16-07">
                          <multiline>Copyright &copy; 2019 stms.site -</multiline> <b><unsubscribe>Unsubscribe</unsubscribe></b>
                          <multiline>
                            <b>- <a href="#" style="text-decoration:none; color:#FFF;">Support</a></b></multiline>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#FFF; font-weight:bold; line-height:28px;"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle">
              <table width="450" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td height="90" align="center" valign="top" style="font-size:90px; line-height:90px;">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>


      </td>
    </tr>
  </table>

  <!--Main Table End-->

</body>

</html>