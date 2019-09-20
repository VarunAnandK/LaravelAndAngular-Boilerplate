import { Component } from '@angular/core';
import Pusher from 'pusher-js';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  title = 'alpha-web';
  private pusherClient: Pusher;
  constructor() {
    debugger
    this.pusherClient = new Pusher('19d2025e10fd2bddfd72', { cluster: 'ap2', forceTLS: true });
    const channel = this.pusherClient.subscribe('AlphaChannel1');
    debugger
    channel.bind('AlphaEvent', function (data) {
      alert(JSON.stringify(data));
    });
  }
}
