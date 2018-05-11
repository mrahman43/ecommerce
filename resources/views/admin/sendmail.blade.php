@extends('layouts.admin.main')

@section('js')
  <script type="text/javascript" src="{{ asset('admin/assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/editors/wysihtml5/wysihtml5.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/editors/wysihtml5/toolbar.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/editors/wysihtml5/parsers.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/plugins/notifications/jgrowl.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('admin/assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin/assets/js/pages/editor_wysihtml5.js') }}"></script>
@endsection

@section('title')
| Send Mail
@endsection

@section('breadcrumb')
Send Mail
@endsection

@section('content')
  <iv class="content">

					<!-- WYSIHTML5 basic -->
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Send Mail</h5>
						</div>

						<div class="panel-body">
							<form action="{{ route('admin.mail.post') }}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <lable name="email">Subject</label>
                      <input name="subject" id="subject" class="form-control">
                </div>
								<div class="form-group">
                  <lable name="message">Message</label>
                    <textarea name="message" cols="18" rows="18" class="wysihtml5 wysihtml5-min form-control" placeholder="Enter text ...">

                  	<h1>WYSIHTML5 - A better approach to rich text editing</h1>
										<p>wysihtml5 is an <span class="wysiwyg-color-green"><a rel="nofollow" target="_blank" href="https://github.com/xing/wysihtml5">open source</a></span> rich text editor based on HTML5 technology and the progressive-enhancement approach.
										It uses a sophisticated security concept and aims to generate fully valid HTML5 markup by preventing unmaintainable tag soups and inline styles.</p>
										<h2>Features</h2>
										<ul>
											<li>It's fast and lightweight (smaller than TinyMCE, Aloha, ...)</li>
											<li>Auto-linking of urls as-you-type</li>
											<li>Generates valid and semantic HTML5 markup (even when the content is pasted from MS Word)</li>
											<li>Uses class names instead of inline styles</li>
											<li>Unifies line break handling across browsers</li>
											<li>Uses sandboxed iframes in order to prevent identity theft through XSS</li>
											<li>Speech-input for Chrome</li>
										</ul>
										<h2>Browser Support</h2>
										<ul>
											<li><img width="24" alt="" src="http://xing.github.com/wysihtml5/img/icn_firefox.png" height="24"> Firefox 3.5+</li>
											<li><img width="24" alt="" src="http://xing.github.com/wysihtml5/img/icn_chrome.png" height="24"> Chrome</li>
											<li><img width="24" alt="" src="http://xing.github.com/wysihtml5/img/icn_internet_explorer.png" height="24"> IE 8+</li>
											<li><img width="24" alt="" src="http://xing.github.com/wysihtml5/img/icn_safari.png" height="24"> Safari 4+</li>
											<li><img width="24" alt="" src="http://xing.github.com/wysihtml5/img/icn_ios.png" height="24"> Safari on iOS 5+</li>
											<li><img width="24" alt="" src="http://xing.github.com/wysihtml5/img/icn_opera.png" height="24"> Opera 11+</li>
											<li><strong>Graceful degradation:</strong> Unsupported browsers will get a textarea</li>
										</ul>
									</textarea>
								</div>

				                <div class="text-right">
					                <button type="submit" class="btn btn-danger">Cancel</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
					<!-- /WYSIHTML5 basic -->
				</div>
@endsection
