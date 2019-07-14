                  <div class="progress-group">
                  <span class="progress-number"><b>{{$sum}}</b>/{{$model->waktu}}</span>

                    <div class="progress sm">
                    <div class="progress-bar progress-bar-aqua" style="width: {{number_format(($sum/$model->waktu)*100,2)}}%"></div>
                    </div>
                  </div>
