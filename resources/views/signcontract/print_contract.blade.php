<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contract Details</title>
    <style>
        @page {
            margin-top: 0px;
        }

        body {
            margin-top: 0px;
        }

        {{ $css_data }}
    </style>
</head>

<body>
    <div class="container">

        <div class="row py-3">
            <div class="col-12">
                <img style="height:160px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/uploads/cosmetic_finance_group.jpeg'))) }}">

            </div>
            <div class="col-12">
                <h2>
                    Contract Details
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 request-form" style="padding-bottom: 15px;">


                <div class="col-12">
                    <p>This Agreement (“Agreement”) is made and entered into as of the date written below and by and
                        between
                        Cosmetic Finance Group Limited (“CFG”) and IAR {{ $ContractModel['iar'] ?? '' }}
                        (Introducer Appointed
                        Representative, “IAR”), (each a “Party” and collectively the “Parties”) with regard to the
                        following:
                    </p>

                    <p class="mt-3">
                        WHEREAS, {{ $ContractModel['whereas'] ?? '' }} is
                        engaged, on an
                        independent
                        contractor basis, to act as an IAR of CFG, and WHEREAS,
                        as an IAR of CFG, {{ $ContractModel['cfg'] ?? '' }}
                        shall solicit clients
                        for the COMMERCIAL CREDIT BROKER services provided by
                        CFG, and WHEREAS, {{ $ContractModel['whereas_cfg'] ?? '' }}
                        and CFG wish to clarify
                        the capacity in which {{ $ContractModel['capacity'] ?? '' }} shall serve CFG and
                        the
                        terms and conditions of this agreement with CFG.
                    </p>


                    <p class="mt-3">
                    <h5>AGREEMENT</h5>
                    In consideration of the foregoing and the mutual covenants contained herein and for other good and
                    valuable consideration, the parties agree as follows:
                    </p>

                    <ol>
                        <li>{{ $ContractModel['duties'] ?? '' }} Duties: IAR
                            shall:
                            <ul>
                                <li>Become an IAR of CFG;</li>
                                <li>Execute for CFG customers’ NO advisory services;</li>
                                <li>Perform such other duties, in accordance with CFG'S procedures, as are customarily
                                    performed by
                                    one holding the position of an IAR in a retail firm; and
                                    e. Perform faithfully, industriously and to the best of their ability, all duties
                                    that
                                    may be
                                    required of {{ $ContractModel['pursuant_agreement'] ?? '' }} pursuant to this
                                    Agreement.</li>
                            </ul>
                        </li>
                        <li>Compliance with Rules and Regulations. IAR agrees that when sourcing leads,
                            {{ $ContractModel['leads'] ?? '' }} will strictly
                            adhere to all of the guidelines and procedures established by CFG for the conduct of its
                            IARs as
                            set
                            forth in CFG'S Policies & Procedures Manual; as such manual may be modified from time to
                            time.
                            Pursuant to those requirements, credit services that have not been approved for inclusion in
                            CFG'S
                            program shall not be offered or sold through CFG locations.
                            {{ $ContractModel['cfg_location'] ?? '' }} will also strictly adhere
                            to all
                            rules, regulations, and reporting requirements of CFG & any other relevant regulatory
                            authorities in
                            which {{ $ContractModel['in_which'] ?? '' }} is
                            registered with , and all
                            procedures of any lead broker with which CFG may become
                            associated at any time during the term of this Agreement.
                        </li>

                        <li>
                            Insurance and Licenses. {{ $ContractModel['licenses'] ?? '' }} shall be
                            responsible for maintaining all individual securities
                            registrations required for {{ $ContractModel['registrations_required'] ?? '' }} to carry
                            out their duties hereunder.
                        </li>

                        <li>
                            Supervision. {{ $ContractModel['supervision'] ?? '' }}
                            shall be an IAR of CFG ,
                            and with the exception of FCA regulation, shall be
                            subject in all respects to the supervision, direction and control of the management of CFG.
                            {{ $ContractModel['management_of_cfg'] ?? '' }}
                            duties as an IAR are exclusively supervised by CFG for CFG..
                        </li>

                        <li>
                            Location. IAR will render his/her duties under this Agreement at the locations of
                            {{ $ContractModel['locations_of'] ?? '' }} as
                            designated from time to time.
                        </li>

                        <li>
                            Compensation. As full payment for CFG services under this Agreement, CFG will charge
                            {{ $ContractModel['cfg_will_charge'] ?? '' }} IAR
                            an
                            Application Fee {{ $ContractModel['application_fee'] ?? '' }} the sum as described
                            in the attached Exhibit "A." The Application Fee may be
                            changed at any time at the sole discretion of CFG, provided, however, that no change may be
                            made
                            retroactively.
                            With respect to fees payable to {{ $ContractModel['payable_to'] ?? '' }} , CFG
                            shall make no payment to IAR . No finance will be
                            payable
                            to {{ $ContractModel['payable_to_relating'] ?? '' }}
                            relating to products or services
                            for which {{ $ContractModel['services_for_which'] ?? '' }}
                            is not fully licensed and or
                            approved to
                            provide.
                            On approval of finance for {{ $ContractModel['finance_for'] ?? '' }} customer's
                            CFG will retain 10% of the total sum approved by the
                            lender and will retain 60% of such sum with the remaining 40% being retained by the lender.
                            Please
                            see Fee examples in Exhibit 'A'.
                        </li>

                        <li>
                            Trade Secrets. With the exception of the compensation described in paragraph 6 above, CFG
                            will be
                            entitled to all of the benefits or profits arising from, or incident to, all of the work,
                            services
                            and advice {{ $ContractModel['and_advice'] ?? '' }}
                            provides hereunder. In
                            consideration of the agreement of CFG to engage {{ $ContractModel['to_engage'] ?? '' }} as
                            provided herein, and as an expressed condition thereto,
                            {{ $ContractModel['condition_thereto'] ?? '' }} agrees that, except at
                            the
                            written
                            direction of CFG , {{ $ContractModel['direction_of_cfg'] ?? '' }} will not at any
                            time after the termination of this Agreement, either
                            directly or indirectly, divulge, disclose, or communicate any trade secrets. Trade secrets
                            shall
                            mean any information which is not generally known or publicly available outside of CFG
                            concerning
                            any matters relating to the affairs or business of CFG including, without limitation the
                            generality
                            of the foregoing information concerning lenders , lenders customers accounts or portfolios,
                            and/or
                            any other information concerning the business of the lender, its manner of operation, its
                            plans,
                            or
                            other data.
                        </li>

                        <li>
                            Books and Records. IAR agrees that all memoranda, notes, records or other documents made or
                            compiled by IAR, or made available to IAR during the term of this Agreement concerning the
                            business
                            of the lender, or any account or portfolios of any of the lender's customers, shall be
                            delivered
                            by
                            IAR to the lender upon the termination of IAR's status as an independent contractor or at
                            any
                            other
                            time at the lender's request, and that none of such records, nor any part of them, is to be
                            removed
                            from the branch at which IAR is engaged, either in original form or in duplicated or copied
                            form,
                            and that the names, addresses, and other facts in such records are not to be transmitted
                            verbally
                            except as necessary in the ordinary course of conducting business for the lender.
                        </li>

                        <li>
                            Unfair Competition. IAR also agrees that, during his/her engagement under this Agreement and
                            within two (2) year after the termination of this Agreement, IAR will not either directly or
                            indirectly, for his/her own account or as an agent, representative, servant or IAR, officer,
                            director or principal shareholder of any corporation or member of any firm, or participant
                            in
                            any
                            venture which:
                            <ul>
                                <li>
                                    induce any person employed by or contracted with CFG to leave such
                                    employment/engagement.
                                </li>
                                <li>
                                    engage, hire, employ or solicit the employment of any of the IARs of CFG affiliates,
                                    other
                                    than
                                    on behalf of CFG; or
                                </li>
                                <li>
                                    interfere with, disrupt or attempt to disrupt the relationship, contractual or
                                    otherwise,
                                    between
                                    CFG and any existing or prospective customer of the lender.
                                </li>
                            </ul>
                        </li>

                        <li>
                            IAR Covenants. The parties acknowledge that upon termination of registration, IAR will not
                            solicit business from CFG, specifically customers of the lender at the time of the
                            termination
                            of
                            registration. While some persons may desire to move their accounts to IAR if IAR continues
                            in
                            the
                            business and this Agreement does not prevent that, IAR will do nothing to encourage,
                            communicate, or
                            initiate those transfers.
                        </li>

                        <li>
                            Modification and Waiver. No waiver or modification of this Agreement shall be valid unless
                            in
                            writing and duly executed by the party to be charged therewith. Waiver by either party
                            hereto of
                            any
                            breach or default by the other party or any of the terms and provisions of this Agreement
                            shall
                            not
                            operate as a waiver of any other breach or default, whether similar to, or different from,
                            the
                            breach or default waived.
                        </li>

                        <li>
                            Entire Agreement. This Agreement and it's attachments constitutes the entire Agreement
                            between
                            the parties hereto with respect to IAR's engagement with CFG and supersedes all prior
                            agreements
                            and
                            understandings, written or oral, between IAR and CFG with respect to such affiliation,
                            including
                            any
                            written agreements previously executed by IAR and CFG. This Agreement and the rights and
                            obligations
                            hereunder shall be assignable or transferable by CFG at the sole option of CFG. This
                            Agreement
                            may
                            only be amended in writing signed by duly authorized representatives of the parties hereto.
                        </li>

                        <li>
                            Termination. This Agreement may be terminated at any time by IAR or CFG. However, IAR hereby
                            agrees and acknowledges that the provisions of paragraphs 8, 9, 10 and 12 of this Agreement
                            shall
                            survive the termination of this Agreement and of IAR's association with CFG hereunder,
                            irrespective
                            of the reason therefore, in accordance with the terms of such paragraphs. Notwithstanding
                            anything
                            else herein to the contrary, IAR's registration may be terminated at will by IAR or by CFG
                            at
                            any
                            time. Nothing herein nor in any other document, including without limitation, any personnel
                            manual
                            of CFG constitutes a guarantee of continued registration, changes the "at will" status of
                            IAR's
                            registration, or affects the ability of IAR or of CFG to terminate IAR's registration at any
                            time.
                        </li>

                        <li>
                            Transfer and Assignment. This Agreement and the rights and obligations hereunder shall be
                            assignable or transferable by CFG at the sole option of CFG.
                        </li>

                        <li>
                            Governing Law. The terms of this Agreement shall be construed in accordance with and
                            governed by
                            the laws of England & Wales and exclusive venue shall be in Manchester for any dispute
                            arising
                            in
                            connection with or related to this agreement.
                        </li>

                        <li>
                            Counterparts. This Agreement may be executed in counterparts and all documents so executed
                            shall
                            constitute one agreement binding on all of the parties hereto, notwithstanding that all of
                            the
                            parties are not signatories to the original or the same counterparts.
                        </li>
                    </ol>

                    <p>
                        IN WITNESS WHEREOF, the parties hereto have executed this Agreement on the date set forth above.
                        I
                        acknowledge that I have received the IAR manual.
                    </p>

                    <h5>ADVISOR REPRESENTATIVE</h5>

                    <div class="from-group col-md-8 row">
                        <label>Signature Date: </label>&nbsp;&nbsp;{{ $ContractModel['signature_date'] ?? '' }}
                    </div>

                    <div class="from-group col-md-8 row">
                        <label>IAR Name (print): </label>&nbsp;&nbsp;{{ $ContractModel['iar_name'] ?? '' }}
                    </div>



                    <div class="from-group col-md-8 row">
                        <label>Signature: </label>
                        @if ($ContractModel['signature'] != '')
                            <img style="height:160px;"
                                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/uploads/' . $ContractModel['signature']))) }}">
                        @endif
                    </div>

                    <div class="from-group col-md-8 row">
                        <label>Date:</label>&nbsp;&nbsp;
                        {{ $ContractModel['date'] ?? '' }}
                    </div>



                    Exhibit “A” – <strong>Compensation Schedule</strong>
                    <p>
                        IAR Agreement
                    </p>

                    <p class="mt-3">
                        CFG will be compensated by Fees from funding received by IAR for services they provide to
                        consumers.
                        The sum equivalent to 10% of the approved lending will be retained and distributed at the rate
                        of
                        60% to CFG and 40% retained by the lender.
                    </p>

                    <p class="mt-3">
                        <strong>Example;</strong>
                    </p>

                    <table>
                        <tr>
                            <td>Funding Amount</td>
                            <td>£1000.00</td>
                        </tr>
                        <tr>
                            <td>10% Fee</td>
                            <td>£100.00</td>
                        </tr>
                        <tr>
                            <td>Fee to CFG</td>
                            <td style="text-align: right;">£60.00</td>
                        </tr>
                        <tr>
                            <td>Fee to Lender</td>
                            <td style="text-align: right;">£40.00</td>
                        </tr>
                        <tr>
                            <td>Funds sent to IAR</td>
                            <td>£900.00</td>
                        </tr>
                    </table>


                    <p class="mt-3">
                    <table>
                        <tr>
                            <td>Application Fee</td>
                            <td>£150 (non refundable)</td>
                        </tr>
                    </table>
                    </p>

                    <p class="mt-3">
                        £50 monthly fee once live (minimum 12 months contract)
                        thereafter, 3 months notice if you wish to cancel (to be given in writing)
                    </p>

                    <p class="mt-3">
                        These schedules are subject to change at any time.
                    </p>

                </div>

            </div>
        </div>
    </div>
</body>

</html>
