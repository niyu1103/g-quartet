<?php get_header(); ?>
  <main>
    <div class="container">
      <div class="hd-01--bg">
        <h1 class="hd-tit-01">Contact<span class="hd-tit-01--sub">お問い合わせ</span></h1>
        <section>
          <p class="hd-txt">
            お問い合わせ内容につきまして、担当者より2－3営業日中にご返信申し上げます。<br class="pc_only">万が一返信がございません場合は、メールアドレス相違等が考えられますため、<br
              class="pc_only">ご再送いただけますようお願い申し上げます。
          </p>
        </section>
      </div>
    </div>
    <section>
      <div class="container contact-inner target">
        <form method="POST" class="contact-form">
          <div class="item">
            <label class="label">
              <span class="label-tit">貴社名</span>
              <input class="inputs" type="text" name="co_name" placeholder="例：株式会社グローバル・カルテット">
            </label>
          </div>
          <div class="item">
            <label class="label">
              <span class="label-tit">お名前</span>
              <div class="inputs_name">
                <input class="inputs half" type="text" name="last_name" placeholder="姓">
                <input class="inputs half" type="text" name="first_name" placeholder="名">
              </div>
            </label>
          </div>
          <div class="item">
            <label class="label">
              <span class="label-tit">メールアドレス</span>
              <input class="inputs" type="email" name="email" placeholder="例：example@yourdomain.com">
            </label>
          </div>
          <div class="item">
            <label class="label">
              <span class="label-tit">電話番号</span>
              <input class="inputs" type="tel" name="tel" placeholder="例：0000000000">
            </label>
          </div>
          <div class="item checkbox-box">
            <p class="label">
              <span class="label-tit">お問い合わせ内容</span>
            </p>
            <div class="checkbox">
              <span class="checkbox_list">
                <input id="request" type="checkbox" name="request" value="資料請求" checked>
                <label for="request">資料請求</label>
                <input id="service-contact" type="checkbox" name="request" value="サービスに関するお問い合わせ">
                <label for="service-contact">サービスに関するお問い合わせ</label>
                <input id="interview-contact" type="checkbox" name="request" value="取材に関するお問い合わせ">
                <label for="interview-contact">取材に関するお問い合わせ</label>
                <input id="other" type="checkbox" name="request" value="その他">
                <label for="other">その他</label>
              </span>
            </div>
          </div>
          <div class="item mes">
            <textarea class="inputs" name="comment" rows="5" cols="50"></textarea>
          </div>
          <p class="contact-mes">下記の個人情報保護方針をご確認の上、<br class="sp_only">先へお進みください。</p>
          <div class="btn-submit">
            <input type="submit" value="送信する">
          </div>
        </form>
      </div>
    </section>
    <section>
      <div class="container policy">
        <h2 class="hd-tit-02">Privacy policy<span class="hd-tit-02--sub">個人情報保護方針</span></h2>
        <div class="policy-box">
          <ol>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">プライバシーポリシー</dt>
                <dd class="policy-txt">
                  株式会社グローバル・カルテット（以下「当社」）は、以下のとおり個人情報保護方針を定め、個人情報保護の仕組みを構築し、全従業員に個人情報保護の重要性の認識と取組みを徹底させることにより、個人情報の保護を推進致します。
                </dd>
              </dl>
            </li>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">個人情報の管理</dt>
                <dd class="policy-txt">
                  当社は、お客さまの個人情報を正確かつ最新の状態に保ち、個人情報への不正アクセス・紛失・破損・改ざん・漏洩などを防止するため、セキュリティシステムの維持・管理体制の整備・社員教育の徹底等の必要な措置を講じ、安全対策を実施し個人情報の厳重な管理を行います。
                </dd>
              </dl>
            </li>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">個人情報の利用目的</dt>
                <dd class="policy-txt">
                  お客さまからお預かりした個人情報は、当社からのご連絡や業務のご案内やご質問に対する回答として、電子メールや資料のご送付に利用いたします。
                </dd>
              </dl>
            </li>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">個人情報の第三者への開示・提供の禁止</dt>
                <dd class="policy-txt">
                  当社は、お客さまよりお預かりした個人情報を適切に管理し、次のいずれかに該当する場合を除き、個人情報を第三者に開示いたしません。
                  <ul>
                    <li>お客さまの同意がある場合</li>
                    <li>お客さまが希望されるサービスを行うために当社が業務を委託する業者に対して開示する場合</li>
                    <li>法令に基づき開示することが必要である場合</li>
                    <li>人の生命、身体または財産の保護のために必要があると弊社が判断した場合</li>
                    <li>国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力することや、その他公共の利益のために特に必要があると弊社が判断した場合</li>
                    <li>ご登録者様または弊社の権利の確保のために必要であると弊社が判断した場合</li>
                  </ul>
                </dd>
              </dl>
            </li>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">個人情報の安全対策</dt>
                <dd class="policy-txt">
                  当社は、個人情報の正確性及び安全性確保のために、セキュリティに万全の対策を講じています。
                </dd>
              </dl>
            </li>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">ご本人の照会</dt>
                <dd class="policy-txt">
                  お客さまがご本人の個人情報の照会・修正・削除などをご希望される場合には、ご本人であることを確認の上、対応させていただきます。
                </dd>
              </dl>
            </li>
            <li class="policy-list">
              <dl>
                <dt class="policy-tit">法令、規範の遵守と見直し</dt>
                <dd class="policy-txt">
                  当社は、保有する個人情報に関して適用される日本の法令、その他規範を遵守するとともに、本ポリシーの内容を適宜見直し、その改善に努めます。
                </dd>
              </dl>
            </li>
          </ol>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="contact_pagetop">
          <div class="to-top pc_only">
            <a href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/page_top.png" alt="totop">
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
